<?php

namespace Azuriom\Plugin\DiscordLogin\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Show the plugin's settings.
     */
    public function show()
    {
        return view('discord-login::admin.settings', [
            'allowDuplicates' => setting('discord-login.allow_duplicates', false),
        ]);
    }

    /**
     * Save the plugin's settings.
     */
    public function save(Request $request)
    {
        Setting::updateSettings([
            'discord-login.allow_duplicates' => $request->boolean('allow_duplicates'),
        ]);

        return to_route('discord-login.admin.settings')
            ->with('success', trans('messages.status.success'));
    }
}
