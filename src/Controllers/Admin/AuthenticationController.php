<?php

namespace Azuriom\Plugin\DiscordIntegration\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Setting;
use Azuriom\Plugin\DiscordIntegration\Support\DiscordBotClient;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    /**
     * Show the plugin's login/registration behavior settings.
     */
    public function show()
    {
        return view('discord-integration::admin.authentication', [
            'enabled' => setting('discord-integration.enabled', true),
            'allowDuplicates' => setting('discord-integration.allow_duplicates', false),
            'allowPasswordless' => setting('discord-integration.allow_passwordless', true),
            'matchByEmail' => setting('discord-integration.match_by_email', false),
            'customizableEmail' => setting('discord-integration.customizable_email', false),
            'syncAvatar' => setting('discord-integration.sync_avatar', false),
            'requiredGuildId' => setting('discord-integration.required_guild_id'),
            'bypassMaintenance' => setting('discord-integration.bypass_maintenance', true),
            'guilds' => DiscordBotClient::available() ? DiscordBotClient::guilds() : null,
        ]);
    }

    /**
     * Save the plugin's login/registration behavior settings.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'required_guild_id' => ['nullable', 'string'],
        ]);

        $allowDuplicates = $request->boolean('allow_duplicates');
        $matchByEmail = $request->boolean('match_by_email');
        $customizableEmail = $request->boolean('customizable_email');

        // Matching accounts by email is already the weaker, opt-in fallback (see
        // DiscordIntegrationController::callback()); combining it with duplicate
        // Discord links or a freely customizable registration email would make
        // that matching even less meaningful, so these options are kept mutually
        // exclusive.
        if ($matchByEmail && $allowDuplicates) {
            throw ValidationException::withMessages([
                'allow_duplicates' => trans('discord-integration::admin.incompatible_with_match_by_email', [
                    'option' => trans('discord-integration::admin.match_by_email'),
                ]),
            ]);
        }

        if ($matchByEmail && $customizableEmail) {
            throw ValidationException::withMessages([
                'customizable_email' => trans('discord-integration::admin.incompatible_with_match_by_email', [
                    'option' => trans('discord-integration::admin.match_by_email'),
                ]),
            ]);
        }

        Setting::updateSettings([
            'discord-integration.enabled' => $request->boolean('enabled'),
            'discord-integration.allow_duplicates' => $allowDuplicates,
            'discord-integration.allow_passwordless' => $request->boolean('allow_passwordless'),
            'discord-integration.match_by_email' => $matchByEmail,
            'discord-integration.customizable_email' => $customizableEmail,
            'discord-integration.sync_avatar' => $request->boolean('sync_avatar'),
            'discord-integration.required_guild_id' => $request->input('required_guild_id'),
            'discord-integration.bypass_maintenance' => $request->boolean('bypass_maintenance'),
        ]);

        return to_route('discord-integration.admin.authentication')
            ->with('success', trans('messages.status.success'));
    }
}
