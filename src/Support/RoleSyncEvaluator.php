<?php

namespace Azuriom\Plugin\DiscordIntegration\Support;

use Azuriom\Models\User;
use Azuriom\Plugin\DiscordIntegration\Models\RoleSync;
use Azuriom\Plugin\Shop\Models\PaymentItem;
use Azuriom\Plugin\Shop\Models\Subscription;
use Illuminate\Support\Collection;

/**
 * Evaluates the plugin's role-sync rules against users and keeps their
 * Discord guild roles in line with the result. See RoleSync for the rule
 * shape and DiscordBotClient for the actual Discord API calls.
 */
class RoleSyncEvaluator
{
    /**
     * The rules a user currently matches (every condition set on a rule is
     * ANDed; a rule with no conditions at all matches everyone).
     *
     * @return Collection<int, RoleSync>
     */
    public function rulesMatchedBy(User $user): Collection
    {
        return RoleSync::all()->filter(fn (RoleSync $rule) => $this->matches($user, $rule))->values();
    }

    protected function matches(User $user, RoleSync $rule): bool
    {
        if ($rule->site_role_ids !== null && ! in_array($user->role_id, $rule->site_role_ids)) {
            return false;
        }

        if ($rule->balance_min !== null && $user->money < $rule->balance_min) {
            return false;
        }

        if ($rule->balance_max !== null && $user->money > $rule->balance_max) {
            return false;
        }

        if ($rule->shop_package_id !== null && ! $this->ownsPackage($user, $rule->shop_package_id)) {
            return false;
        }

        return true;
    }

    /**
     * Whether the user currently owns an active subscription to, or a
     * non-expired one-time purchase of, the given shop package. Always false
     * if the (optional) shop plugin isn't installed.
     */
    protected function ownsPackage(User $user, int $packageId): bool
    {
        if (! class_exists(Subscription::class)) {
            return false;
        }

        $hasActiveSubscription = Subscription::where('user_id', $user->id)
            ->where('package_id', $packageId)
            ->scopes('active')
            ->exists();

        if ($hasActiveSubscription) {
            return true;
        }

        return PaymentItem::where('buyable_type', 'shop.packages')
            ->where('buyable_id', $packageId)
            ->whereHas('payment', fn ($query) => $query->where('user_id', $user->id)->scopes('completed'))
            ->scopes('excludeExpired')
            ->exists();
    }

    /**
     * The Discord guild roles this user should currently hold across every
     * matched rule - rules targeting the same (guild, role) pair are ORed.
     *
     * @return array<string, string[]> guild id => role ids
     */
    public function desiredRoles(User $user): array
    {
        $desired = [];

        foreach ($this->rulesMatchedBy($user) as $rule) {
            $desired[$rule->discord_guild_id][] = $rule->discord_role_id;
        }

        return array_map('array_unique', $desired);
    }

    /**
     * Reconcile a single user's Discord guild roles against every guild
     * referenced by any rule, granting/revoking via the bot as needed.
     * No-op if the user isn't Discord-linked or no bot token is configured.
     */
    public function reconcileUser(User $user): void
    {
        $account = $user->discordAccount;

        if ($account === null || ! DiscordBotClient::available()) {
            return;
        }

        $desired = $this->desiredRoles($user);

        foreach (RoleSync::pluck('discord_guild_id')->unique() as $guildId) {
            $currentRoles = DiscordBotClient::guildMemberRoles($guildId, $account->discord_user_id);

            if ($currentRoles === null) {
                continue; // not a member of that guild (or the lookup failed) - nothing to sync there
            }

            $desiredForGuild = $desired[$guildId] ?? [];

            foreach (RoleSync::where('discord_guild_id', $guildId)->pluck('discord_role_id')->unique() as $roleId) {
                $shouldHave = in_array($roleId, $desiredForGuild, true);
                $hasIt = in_array($roleId, $currentRoles, true);

                if ($shouldHave && ! $hasIt) {
                    DiscordBotClient::assignRole($guildId, $account->discord_user_id, $roleId);
                } elseif (! $shouldHave && $hasIt) {
                    DiscordBotClient::removeRole($guildId, $account->discord_user_id, $roleId);
                }
            }
        }
    }

    /**
     * Reconcile every Discord-linked user against every rule - the
     * correctness backstop for conditions with no real-time event (e.g.
     * subscription expiry), run on a schedule (see SyncDiscordRolesCommand).
     */
    public function reconcileAll(): void
    {
        if (! DiscordBotClient::available() || RoleSync::count() === 0) {
            return;
        }

        User::whereHas('discordAccount')->chunkById(50, function (Collection $users) {
            $users->each(fn (User $user) => $this->reconcileUser($user));
        });
    }
}
