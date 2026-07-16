<?php

namespace Azuriom\Plugin\DiscordLogin\Console\Commands;

use Azuriom\Plugin\DiscordLogin\Support\RoleSyncEvaluator;
use Illuminate\Console\Command;

/**
 * The correctness backstop for role-sync rules: real-time listeners (see
 * DiscordLoginServiceProvider::registerRoleSync()) grant access promptly,
 * but can't catch conditions with no matching event (e.g. a subscription
 * lapsing - the shop plugin fires no "cancelled"/"expired" event), so this
 * runs on a schedule to fully reconcile every linked user against every rule.
 */
class SyncDiscordRolesCommand extends Command
{
    protected $signature = 'discord-login:sync-roles';

    protected $description = "Reconcile every linked user's Discord guild roles against the plugin's role-sync rules";

    public function handle(RoleSyncEvaluator $evaluator): int
    {
        $evaluator->reconcileAll();

        return self::SUCCESS;
    }
}
