<?php

namespace Azuriom\Plugin\DiscordLogin\Providers;

use Azuriom\Extensions\Plugin\BasePluginServiceProvider;
use Azuriom\Models\DiscordAccount;
use Azuriom\Models\Permission;
use Azuriom\Models\User;
use Azuriom\Plugin\DiscordLogin\Support\DiscordCredentials;
use Azuriom\Plugin\DiscordLogin\Support\DiscordLoginProfileCard;
use Azuriom\Plugin\DiscordLogin\Support\DiscordOnlyAwareUserProvider;
use Azuriom\Socialite\DiscordProvider;
use Azuriom\Support\Discord\LinkedRoles;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Laravel\Socialite\Contracts\Factory as SocialiteFactory;
use Throwable;

class DiscordLoginServiceProvider extends BasePluginServiceProvider
{
    /**
     * The plugin's global HTTP middleware stack.
     *
     * @var array
     */
    protected array $middleware = [];

    /**
     * The plugin's route middleware groups.
     *
     * @var array
     */
    protected array $middlewareGroups = [];

    /**
     * The plugin's route middleware.
     *
     * @var array
     */
    protected array $routeMiddleware = [];

    /**
     * The policy mappings for this plugin.
     *
     * @var array
     */
    protected array $policies = [];

    /**
     * Bootstrap any plugin services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViews();

        $this->loadTranslations();

        $this->loadMigrations();

        $this->registerRouteDescriptions();

        $this->registerAdminNavigation();

        Permission::registerPermissions([
            'discord-login.admin' => 'discord-login::admin.permission',
        ]);

        $this->registerDuplicateGuard();

        $this->registerUnlinkGuard();

        $this->registerAccountDeletionCleanup();

        $this->registerPasswordLoginGuard();

        $this->registerSocialiteDriver();

        $this->registerViewOverrides();

        $this->registerViewComposers();
    }

    /**
     * Register a dedicated Socialite driver so the plugin can use its own
     * Discord application credentials when the corresponding setting is
     * enabled, instead of always sharing the role-linking ones.
     */
    protected function registerSocialiteDriver(): void
    {
        $socialite = $this->app->make(SocialiteFactory::class);

        $socialite->extend('discord-login', function () use ($socialite) {
            return $socialite->buildProvider(DiscordProvider::class, [
                'client_id' => DiscordCredentials::clientId(),
                'client_secret' => DiscordCredentials::clientSecret(),
                'redirect' => '/discord-login/callback',
            ]);
        });
    }

    /**
     * Returns the routes that should be able to be added to the navbar.
     *
     * @return array
     */
    protected function routeDescriptions()
    {
        return [
            'discord-login.redirect' => trans('discord-login::messages.navbar'),
        ];
    }

    /**
     * Return the admin navigations routes to register in the dashboard.
     *
     * @return array
     */
    protected function adminNavigation()
    {
        return [
            'discord-login' => [
                'name' => trans('Discord Login'),
                'icon' => 'bi bi-discord',
                'route' => 'discord-login.admin.settings',
                'permission' => 'discord-login.admin',
            ],
        ];
    }

    /**
     * Return the user navigations routes to register in the user menu.
     *
     * @return array
     */
    protected function userNavigation()
    {
        return [
            //
        ];
    }

    /**
     * Prevent a Discord account from being linked to more than one user,
     * unless the "allow duplicates" setting is enabled.
     *
     * Uses "saving" rather than "creating" so that re-linking an existing
     * discord_accounts row to a different Discord account (an update, since
     * the core profile flow matches on user_id) is also covered, not just
     * brand new links.
     */
    protected function registerDuplicateGuard(): void
    {
        DiscordAccount::saving(function (DiscordAccount $account) {
            if (! $account->isDirty('discord_user_id')) {
                return;
            }

            if (setting('discord-login.allow_duplicates', false)) {
                return;
            }

            $exists = DiscordAccount::where('discord_user_id', $account->discord_user_id)
                ->when($account->exists, fn ($query) => $query->whereKeyNot($account->getKey()))
                ->exists();

            if ($exists) {
                throw new HttpResponseException(
                    to_route('profile.index')->with('error', trans('discord-login::messages.duplicate'))
                );
            }
        });
    }

    /**
     * Prevent unlinking a Discord account that has no custom password set,
     * since that account would otherwise become impossible to log into.
     *
     * Covers the core profile-unlink flow (Azuriom\Http\Controllers\ProfileController::unlinkDiscord)
     * since it just calls delete() on the DiscordAccount model.
     */
    protected function registerUnlinkGuard(): void
    {
        DiscordAccount::deleting(function (DiscordAccount $account) {
            if (! $account->has_custom_password) {
                throw new HttpResponseException(
                    to_route('profile.index')->with('error', trans('discord-login::messages.profile.unlink_locked'))
                );
            }
        });
    }

    /**
     * Remove the Discord link when its account is deleted (Azuriom anonymizes the
     * user row in place instead of removing it, so discord_accounts would otherwise
     * keep pointing at the "Deleted #id" account, allowing login into it via Discord).
     *
     * Deletes directly through the query builder (not the Eloquent model) so this
     * bypasses the "unlink" guard above, which shouldn't apply here: the account
     * is gone either way, there's no risk of locking the (deleted) user out.
     */
    protected function registerAccountDeletionCleanup(): void
    {
        User::deleted(function (User $user) {
            $account = DiscordAccount::where('user_id', $user->id)->first();

            if ($account === null) {
                return;
            }

            try {
                LinkedRoles::clearRole($account);
            } catch (Throwable $e) {
                report($e);
            }

            DiscordAccount::whereKey($account->getKey())->delete();
        });
    }

    /**
     * Explicitly reject password logins for accounts with no custom password,
     * instead of relying only on their random generated password being unguessable.
     *
     * Swaps the "users" auth provider for a subclass that adds this check, so it
     * applies wherever a password is checked (login, current_password rule, etc.)
     * without touching core's LoginController.
     */
    protected function registerPasswordLoginGuard(): void
    {
        Auth::provider('discord-login-eloquent', function ($app, array $config) {
            return new DiscordOnlyAwareUserProvider($app['hash'], $config['model']);
        });

        config(['auth.providers.users.driver' => 'discord-login-eloquent']);
    }

    /**
     * Override the core auth views with the plugin's copies, so a Discord
     * login/register button can be added without editing the core views.
     */
    protected function registerViewOverrides(): void
    {
        View::getFinder()->prependLocation($this->pluginResourcePath('views/overrides'));
    }

    protected function registerViewComposers(): void
    {
        View::composer(['auth.login', 'auth.register'], function ($view) {
            $view->with('discordLoginEnabled', DiscordCredentials::clientId() !== null);
        });

        View::composer('profile.index', DiscordLoginProfileCard::class);
    }
}
