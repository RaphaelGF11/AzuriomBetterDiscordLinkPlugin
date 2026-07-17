<?php

namespace Azuriom\Plugin\DiscordIntegration\Providers;

use Azuriom\Extensions\Plugin\BasePluginServiceProvider;
use Azuriom\Http\Middleware\CheckForMaintenanceSettings;
use Azuriom\Models\DiscordAccount;
use Azuriom\Models\Permission;
use Azuriom\Models\User;
use Azuriom\Plugin\DiscordIntegration\Console\Commands\SyncDiscordRolesCommand;
use Azuriom\Plugin\DiscordIntegration\Support\DiscordCredentials;
use Azuriom\Plugin\DiscordIntegration\Support\DiscordIntegrationProfileCard;
use Azuriom\Plugin\DiscordIntegration\Support\DiscordOnlyAwareUserProvider;
use Azuriom\Plugin\DiscordIntegration\Support\MaintenanceBypassMiddleware;
use Azuriom\Plugin\DiscordIntegration\Support\RoleSyncEvaluator;
use Azuriom\Socialite\DiscordProvider;
use Azuriom\Support\Discord\LinkedRoles;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use Laravel\Socialite\Contracts\Factory as SocialiteFactory;
use Throwable;

class DiscordIntegrationServiceProvider extends BasePluginServiceProvider
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
            'discord-integration.admin' => 'discord-integration::admin.permission',
        ]);

        $this->registerDuplicateGuard();

        $this->registerUnlinkGuard();

        $this->registerAccountDeletionCleanup();

        $this->registerPasswordLoginGuard();

        $this->registerPasswordSync();

        $this->registerLinkPasswordSync();

        $this->registerSocialiteDriver();

        $this->registerMaintenanceBypass();

        $this->registerRoleSync();

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

        $socialite->extend('discord-integration', function () use ($socialite) {
            return $socialite->buildProvider(DiscordProvider::class, [
                'client_id' => DiscordCredentials::clientId(),
                'client_secret' => DiscordCredentials::clientSecret(),
                'redirect' => '/discord-integration/callback',
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
            'discord-integration.redirect' => trans('discord-integration::messages.navbar'),
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
            'discord-integration' => [
                'name' => 'Discord',
                'icon' => 'bi bi-discord',
                'type' => 'dropdown',
                'route' => 'discord-integration.admin.*',
                'permission' => 'discord-integration.admin',
                'items' => [
                    'discord-integration.admin.configuration' => trans('discord-integration::admin.nav.configuration'),
                    'discord-integration.admin.authentication' => trans('discord-integration::admin.nav.authentication'),
                    'discord-integration.admin.roles' => trans('discord-integration::admin.nav.roles'),
                ],
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

            if (setting('discord-integration.allow_duplicates', false)) {
                return;
            }

            $exists = DiscordAccount::where('discord_user_id', $account->discord_user_id)
                ->when($account->exists, fn ($query) => $query->whereKeyNot($account->getKey()))
                ->exists();

            if ($exists) {
                throw new HttpResponseException(
                    to_route('profile.index')->with('error', trans('discord-integration::messages.duplicate'))
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
                    to_route('profile.index')->with('error', trans('discord-integration::messages.profile.unlink_locked'))
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
        Auth::provider('discord-integration-eloquent', function ($app, array $config) {
            return new DiscordOnlyAwareUserProvider($app['hash'], $config['model']);
        });

        config(['auth.providers.users.driver' => 'discord-integration-eloquent']);
    }

    /**
     * Mark a Discord account as having a custom password as soon as its
     * user's password is actually changed, regardless of which flow did it
     * (admin edit at /admin/users/{id}/edit, forgot-password reset, this
     * plugin's own profile "set a password" action, ...). Otherwise a
     * password set this way would work, but the account would still be
     * treated as passwordless everywhere else (login guard, unlink guard,
     * profile views).
     *
     * Also clears users.discord_integration_passwordless, the flag that survives a
     * forced admin unlink of a passwordless account (see
     * Admin\UserController::forceUnlinkDiscord()) after its discord_accounts
     * row is gone - saved quietly to avoid re-triggering this same listener.
     */
    protected function registerPasswordSync(): void
    {
        User::saved(function (User $user) {
            if (! $user->wasChanged('password')) {
                return;
            }

            if ($user->discord_integration_passwordless) {
                $user->forceFill(['discord_integration_passwordless' => false])->saveQuietly();
            }

            $account = $user->discordAccount;

            if ($account !== null && ! $account->has_custom_password) {
                $account->forceFill(['has_custom_password' => true])->save();
            }
        });
    }

    /**
     * Mirror users.discord_integration_passwordless onto any *new* discord_accounts
     * row's has_custom_password, in the other direction from registerPasswordSync()
     * above.
     *
     * This plugin's own register() already sets has_custom_password correctly
     * on the row it creates. But a new row can also be created by the core
     * profile Discord-link flow (Azuriom\Http\Controllers\ProfileController),
     * which knows nothing about this plugin's passwordless concept and always
     * defaults has_custom_password to true (the migration's column default -
     * correct for the common case of linking Discord to an account that
     * already has a real password). Without this, re-linking Discord to a
     * still-passwordless account (e.g. after a forced admin unlink, see
     * Admin\UserController::forceUnlinkDiscord()) would wrongly mark it as
     * having a custom password again, defeating the login guard, unlink
     * guard and profile views that rely on that flag.
     *
     * Uses "creating" (not "saving") so this never re-evaluates on ordinary
     * token-refresh saves() of an *existing* row, which could otherwise wipe
     * out a legitimate has_custom_password=true set later by registerPasswordSync().
     */
    protected function registerLinkPasswordSync(): void
    {
        DiscordAccount::creating(function (DiscordAccount $account) {
            if ($account->user?->discord_integration_passwordless) {
                $account->has_custom_password = false;
            }
        });
    }

    /**
     * Let the plugin's own routes through the core's global maintenance
     * middleware when the "bypass maintenance" setting is enabled - that
     * middleware blocks every route by default, including these, well before
     * the controller (and its own maintenance handling) ever runs.
     */
    protected function registerMaintenanceBypass(): void
    {
        $this->app->bind(CheckForMaintenanceSettings::class, MaintenanceBypassMiddleware::class);
    }

    /**
     * Keep Discord guild roles in line with the role-sync rules (see
     * RoleSync/RoleSyncEvaluator): reconcile a user in real time whenever a
     * condition-relevant change happens, and register a scheduled sweep as
     * the correctness backstop for changes with no matching event (a shop
     * subscription lapsing fires nothing - see SyncDiscordRolesCommand).
     */
    protected function registerRoleSync(): void
    {
        $evaluator = fn () => $this->app->make(RoleSyncEvaluator::class);

        User::updated(function (User $user) use ($evaluator) {
            if ($user->isDirty('role_id') || $user->isDirty('money')) {
                $evaluator()->reconcileUser($user);
            }
        });

        // The shop plugin is optional and may not be installed/enabled.
        if (class_exists(\Azuriom\Plugin\Shop\Events\PackageDelivered::class)) {
            Event::listen(\Azuriom\Plugin\Shop\Events\PackageDelivered::class, function ($event) use ($evaluator) {
                $evaluator()->reconcileUser($event->user);
            });
        }

        if ($this->app->runningInConsole()) {
            $this->commands([SyncDiscordRolesCommand::class]);
        }

        $this->app->booted(function () {
            $this->app->make(Schedule::class)
                ->command(SyncDiscordRolesCommand::class)
                ->everyFifteenMinutes();
        });
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
            $view->with('discordLoginEnabled', setting('discord-integration.enabled', true) && DiscordCredentials::clientId() !== null);
            $view->with('discordGuildRestricted', setting('discord-integration.required_guild_id') !== null);
        });

        View::composer('profile.index', DiscordIntegrationProfileCard::class);
    }
}
