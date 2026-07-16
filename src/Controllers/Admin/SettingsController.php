<?php

namespace Azuriom\Plugin\DiscordLogin\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Setting;
use Azuriom\Plugin\DiscordLogin\Support\DiscordCredentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class SettingsController extends Controller
{
    /**
     * Show the plugin's settings.
     */
    public function show(Request $request)
    {
        return view('discord-login::admin.settings', [
            'allowDuplicates' => setting('discord-login.allow_duplicates', false),
            'allowPasswordless' => setting('discord-login.allow_passwordless', true),
            'useCustomCredentials' => setting('discord-login.use_custom_credentials', false),
            'customClientId' => setting('discord-login.client_id'),
            'customClientSecret' => setting('discord-login.client_secret'),
            'matchByEmail' => setting('discord-login.match_by_email', false),
            'showHttpWarning' => $this->isInsecureNonLocalUrl($request),
        ]);
    }

    /**
     * Discord requires HTTPS redirect URIs, except for the "localhost"/"127.0.0.1"
     * exception it makes for local development. Everything else served over plain
     * HTTP will always fail with an "invalid redirect_uri" error on Discord's side.
     */
    protected function isInsecureNonLocalUrl(Request $request): bool
    {
        if ($request->secure()) {
            return false;
        }

        return ! in_array($request->getHost(), ['localhost', '127.0.0.1'], true);
    }

    /**
     * Save the plugin's settings.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'client_id' => ['nullable', 'required_with:use_custom_credentials', 'string'],
            'client_secret' => ['nullable', 'required_with:use_custom_credentials', 'string'],
        ]);

        Setting::updateSettings([
            'discord-login.allow_duplicates' => $request->boolean('allow_duplicates'),
            'discord-login.allow_passwordless' => $request->boolean('allow_passwordless'),
            'discord-login.use_custom_credentials' => $request->boolean('use_custom_credentials'),
            'discord-login.client_id' => $request->input('client_id'),
            'discord-login.client_secret' => $request->input('client_secret'),
            'discord-login.match_by_email' => $request->boolean('match_by_email'),
        ]);

        return to_route('discord-login.admin.settings')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Verify that client_id/client_secret are a valid Discord app pair, using the
     * OAuth2 client_credentials grant. This alone cannot confirm the redirect URLs
     * are registered on Discord's side (see testCallback() below for that).
     */
    public function testCredentials()
    {
        $clientId = DiscordCredentials::clientId();
        $clientSecret = DiscordCredentials::clientSecret();

        if ($clientId === null || $clientSecret === null) {
            return to_route('discord-login.admin.settings')
                ->with('error', trans('discord-login::admin.test.not_configured'));
        }

        try {
            $response = Http::asForm()
                ->withBasicAuth($clientId, $clientSecret)
                ->post('https://discord.com/api/oauth2/token', [
                    'grant_type' => 'client_credentials',
                    'scope' => 'identify',
                ]);
        } catch (Throwable $e) {
            return to_route('discord-login.admin.settings')
                ->with('error', trans('discord-login::admin.test.network_error'));
        }

        if (! $response->successful()) {
            return to_route('discord-login.admin.settings')
                ->with('error', trans('discord-login::admin.test.credentials_invalid'));
        }

        return to_route('discord-login.admin.settings')
            ->with('success', trans('discord-login::admin.test.credentials_ok'));
    }

    /**
     * Start a real OAuth round-trip through one of the plugin's two actual
     * callback URLs (login or password-confirm) and back, the only reliable way
     * to confirm it is actually registered on the Discord application: Discord
     * validates redirect_uri when the (logged-in admin) user reaches the consent
     * step, well after the initial /authorize request, so nothing short of an
     * actual round-trip can prove it server-side. See
     * DiscordLoginController::callback()/confirmCallback()/handleAdminTest()
     * for the other end of this round-trip.
     */
    public function testCallback(Request $request)
    {
        abort_if(DiscordCredentials::clientId() === null, 404);

        $redirectUrl = $request->query('target') === 'confirm'
            ? route('discord-login.confirm.callback')
            : route('discord-login.callback');

        $request->session()->put('discord-login.admin_test', true);

        return Socialite::driver('discord-login')
            ->scopes(['identify'])
            ->redirectUrl($redirectUrl)
            ->redirect();
    }
}
