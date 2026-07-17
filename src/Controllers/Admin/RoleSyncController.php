<?php

namespace Azuriom\Plugin\DiscordIntegration\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Role;
use Azuriom\Plugin\DiscordIntegration\Models\RoleSync;
use Azuriom\Plugin\DiscordIntegration\Support\DiscordBotClient;
use Azuriom\Plugin\DiscordIntegration\Support\RoleSyncEvaluator;
use Azuriom\Plugin\Shop\Models\Package;
use Illuminate\Http\Request;

class RoleSyncController extends Controller
{
    /**
     * Show the plugin's Discord role sync rules.
     */
    public function index()
    {
        $botAvailable = DiscordBotClient::available();

        return view('discord-integration::admin.roles', [
            'botAvailable' => $botAvailable,
            'guilds' => $botAvailable ? DiscordBotClient::guilds() : null,
            'roleSyncs' => RoleSync::latest()->get(),
            'siteRoles' => Role::orderByDesc('power')->get(),
            'shopPackages' => class_exists(Package::class) ? Package::enabled()->get(['id', 'name']) : null,
        ]);
    }

    /**
     * Create a new role-sync rule and immediately reconcile every linked
     * user against it (rather than waiting for the next scheduled sweep -
     * see SyncDiscordRolesCommand), for prompt feedback in the admin UI.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, RoleSyncEvaluator $evaluator)
    {
        RoleSync::create($this->validated($request));

        $evaluator->reconcileAll();

        return to_route('discord-integration.admin.roles')->with('success', trans('messages.status.success'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, RoleSync $roleSync, RoleSyncEvaluator $evaluator)
    {
        $roleSync->update($this->validated($request));

        $evaluator->reconcileAll();

        return to_route('discord-integration.admin.roles')->with('success', trans('messages.status.success'));
    }

    /**
     * Deleting a rule doesn't retract the role from anyone right away - the
     * next reconciliation (real-time trigger or scheduled sweep) naturally
     * removes it from anyone no longer matching any remaining rule.
     */
    public function destroy(RoleSync $roleSync)
    {
        $roleSync->delete();

        return to_route('discord-integration.admin.roles')->with('success', trans('messages.status.success'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validated(Request $request): array
    {
        return $this->validate($request, [
            'discord_guild_id' => ['required', 'string'],
            'discord_role_id' => ['required', 'string'],
            'site_role_ids' => ['nullable', 'array'],
            'site_role_ids.*' => ['integer', 'exists:roles,id'],
            'shop_package_id' => ['nullable', 'integer'],
            'balance_min' => ['nullable', 'numeric', 'min:0'],
            'balance_max' => ['nullable', 'numeric', 'gte:balance_min'],
        ]);
    }
}
