<?php

namespace Azuriom\Plugin\DiscordLogin\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\DiscordAccount;
use Azuriom\Models\User;
use Azuriom\Rules\GameAuth;
use Azuriom\Rules\Username;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Response;

class DiscordLoginController extends Controller
{
    /**
     * How long a pending Discord login/registration stays valid in session, in seconds.
     */
    protected const PENDING_LIFETIME = 900;

    /**
     * Redirect the user to Discord to log in or register.
     */
    public function redirect(Request $request)
    {
        abort_if(setting('discord.client_id') === null, 404);

        $intent = $request->query('intent') === 'register' ? 'register' : 'login';

        $request->session()->put('discord-login.intent', $intent);

        return $this->driver()->redirect();
    }

    /**
     * Handle the Discord OAuth callback for login/registration.
     */
    public function callback(Request $request): Response
    {
        abort_if(setting('discord.client_id') === null, 404);

        $intent = $request->session()->pull('discord-login.intent', 'login');

        $discordUser = $this->driver()->user();

        // Only trust the email if Discord reports it as verified, otherwise anyone
        // could put someone else's address on their Discord account and register
        // with it here (squatting the address and blocking its real owner).
        $discordEmail = Arr::get($discordUser->getRaw(), 'verified')
            ? Arr::get($discordUser->getRaw(), 'email')
            : null;

        $accounts = DiscordAccount::where('discord_user_id', $discordUser->getId())->get();

        if ($accounts->isEmpty()) {
            $request->session()->put('discord-login.pending', [
                'id' => $discordUser->getId(),
                'username' => $discordUser->getNickname() ?? $discordUser->getName(),
                'email' => $discordEmail,
                'access_token' => $discordUser->token,
                'refresh_token' => $discordUser->refreshToken,
                'expires_in' => $discordUser->expiresIn,
                'created_at' => now()->timestamp,
                'duplicate' => false,
            ]);

            return to_route('discord-login.register.show');
        }

        // The user clicked "Sign up with Discord" but this Discord is already linked
        // to an account: don't silently log them in, ask what they want to do instead.
        if ($intent === 'register') {
            $request->session()->put('discord-login.conflict', [
                'discord_user_id' => $discordUser->getId(),
                'username' => $discordUser->getNickname() ?? $discordUser->getName(),
                'user_ids' => $accounts->pluck('user_id')->all(),
                'access_token' => $discordUser->token,
                'refresh_token' => $discordUser->refreshToken,
                'expires_in' => $discordUser->expiresIn,
                'email' => $discordEmail,
                'created_at' => now()->timestamp,
            ]);

            return to_route('discord-login.conflict.show');
        }

        if ($accounts->count() === 1) {
            $account = $accounts->first();

            $account->forceFill([
                'access_token' => $discordUser->token,
                'refresh_token' => $discordUser->refreshToken,
                'expires_at' => now()->addSeconds($discordUser->expiresIn),
            ])->save();

            return $this->loginAccount($request, $account, $discordEmail);
        }

        $request->session()->put('discord-login.choice', [
            'discord_user_id' => $discordUser->getId(),
            'user_ids' => $accounts->pluck('user_id')->all(),
            'access_token' => $discordUser->token,
            'refresh_token' => $discordUser->refreshToken,
            'expires_in' => $discordUser->expiresIn,
            'email' => $discordEmail,
            'created_at' => now()->timestamp,
        ]);

        return to_route('discord-login.choose.show');
    }

    /**
     * Show the "this Discord is already linked" notice for a register attempt.
     */
    public function showConflict(Request $request)
    {
        $conflict = $this->pending($request, 'discord-login.conflict');

        if ($conflict === null) {
            return to_route('login');
        }

        return view('discord-login::conflict', [
            'allowDuplicates' => setting('discord-login.allow_duplicates', false),
        ]);
    }

    /**
     * Log in to the existing account(s) linked to this Discord, from the conflict screen.
     */
    public function conflictLogin(Request $request): Response
    {
        $conflict = $this->pending($request, 'discord-login.conflict');

        if ($conflict === null) {
            return to_route('login');
        }

        $request->session()->forget('discord-login.conflict');

        if (count($conflict['user_ids']) === 1) {
            $account = DiscordAccount::where('discord_user_id', $conflict['discord_user_id'])
                ->where('user_id', $conflict['user_ids'][0])
                ->firstOrFail();

            $account->forceFill([
                'access_token' => $conflict['access_token'],
                'refresh_token' => $conflict['refresh_token'],
                'expires_at' => now()->addSeconds($conflict['expires_in']),
            ])->save();

            return $this->loginAccount($request, $account, $conflict['email']);
        }

        $request->session()->put('discord-login.choice', Arr::except($conflict, ['username']));

        return to_route('discord-login.choose.show');
    }

    /**
     * Create a new account anyway despite this Discord already being linked,
     * only allowed when duplicate links are enabled.
     */
    public function conflictRegister(Request $request)
    {
        abort_if(! setting('discord-login.allow_duplicates', false), 403);

        $conflict = $this->pending($request, 'discord-login.conflict');

        if ($conflict === null) {
            return to_route('login');
        }

        $request->session()->forget('discord-login.conflict');

        $request->session()->put('discord-login.pending', [
            'id' => $conflict['discord_user_id'],
            'username' => $conflict['username'],
            'email' => $conflict['email'],
            'access_token' => $conflict['access_token'],
            'refresh_token' => $conflict['refresh_token'],
            'expires_in' => $conflict['expires_in'],
            'created_at' => now()->timestamp,
            'duplicate' => true,
        ]);

        return to_route('discord-login.register.show');
    }

    /**
     * Show the account picker when a Discord account is linked to several users.
     */
    public function showChoose(Request $request)
    {
        $choice = $this->pending($request, 'discord-login.choice');

        if ($choice === null) {
            return to_route('login');
        }

        return view('discord-login::choose', [
            'users' => User::whereIn('id', $choice['user_ids'])->get(),
        ]);
    }

    /**
     * Log in the account picked by the user among the linked duplicates.
     */
    public function chooseAccount(Request $request): Response
    {
        $choice = $this->pending($request, 'discord-login.choice');

        if ($choice === null) {
            return to_route('login');
        }

        $this->validate($request, [
            'user_id' => ['required', Rule::in($choice['user_ids'])],
        ]);

        $account = DiscordAccount::where('discord_user_id', $choice['discord_user_id'])
            ->where('user_id', $request->input('user_id'))
            ->firstOrFail();

        $account->forceFill([
            'access_token' => $choice['access_token'],
            'refresh_token' => $choice['refresh_token'],
            'expires_at' => now()->addSeconds($choice['expires_in']),
        ])->save();

        $request->session()->forget('discord-login.choice');

        return $this->loginAccount($request, $account, $choice['email']);
    }

    /**
     * Show the registration completion form for a Discord account with no matching user.
     */
    public function showRegister(Request $request)
    {
        $pending = $this->pending($request, 'discord-login.pending');

        if ($pending === null) {
            return to_route('login');
        }

        return view('discord-login::register', [
            'defaultName' => $pending['username'],
            'discordEmail' => $pending['email'],
            'duplicate' => $pending['duplicate'] ?? false,
        ]);
    }

    /**
     * Complete the registration of a new account for a Discord user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request): Response
    {
        $pending = $this->pending($request, 'discord-login.pending');

        if ($pending === null) {
            return to_route('login');
        }

        if ($pending['email'] !== null && User::where('email', $pending['email'])->exists()) {
            throw ValidationException::withMessages([
                'name' => trans('discord-login::messages.register.email_used'),
            ]);
        }

        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:25', 'unique:users', new Username(), new GameAuth()],
            'password' => ['nullable', 'confirmed', Password::default()],
        ]);

        $password = $data['password'] ?? null;

        // Atomic: if the duplicate guard rejects the Discord link, the user row
        // is rolled back too instead of remaining as an orphan squatting the
        // username and email.
        $user = DB::transaction(function () use ($request, $data, $pending, $password) {
            $user = User::forceCreate([
                'name' => $data['name'],
                'email' => $pending['email'],
                'password' => $password ?? Str::random(128),
                'game_id' => game()->getUserUniqueId($data['name']),
                'last_login_ip' => $request->ip(),
                'last_login_at' => now(),
            ]);

            (new DiscordAccount())->forceFill([
                'user_id' => $user->id,
                'name' => $pending['username'],
                'discord_user_id' => $pending['id'],
                'access_token' => $pending['access_token'],
                'refresh_token' => $pending['refresh_token'],
                'expires_at' => now()->addSeconds($pending['expires_in']),
                'has_custom_password' => filled($password),
                'bypass_2fa' => false,
            ])->save();

            return $user;
        });

        event(new Registered($user));

        $request->session()->forget('discord-login.pending');

        Auth::login($user);

        return to_route('home')->with('success', trans('messages.status.success'));
    }

    /**
     * Enable or disable 2FA bypass for the current user's Discord login.
     */
    public function toggleBypass2fa(Request $request): Response
    {
        $account = $request->user()->discordAccount;

        abort_if($account === null, 404);

        $this->validate($request, ['bypass_2fa' => ['required', 'boolean']]);

        $account->forceFill(['bypass_2fa' => $request->boolean('bypass_2fa')])->save();

        return to_route('profile.index')->with('success', trans('messages.profile.updated'));
    }

    /**
     * Let a Discord-only account (no custom password yet) set a real password.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function setPassword(Request $request): Response
    {
        $account = $request->user()->discordAccount;

        abort_if($account === null || $account->has_custom_password, 404);

        // Setting a password grants a durable credential (and unlocks unlinking
        // Discord), so require a recent identity confirmation first — the same
        // guarantee the core gets from 'current_password' on password changes.
        // For these accounts the confirm page offers the "Confirm with Discord" button.
        $confirmedAt = time() - $request->session()->get('auth.password_confirmed_at', 0);

        if ($confirmedAt > config('auth.password_timeout', 10800)) {
            $request->session()->put('url.intended', route('profile.index'));

            return to_route('password.confirm');
        }

        $data = $this->validate($request, [
            'password' => ['required', 'confirmed', Password::default()],
        ]);

        $user = $request->user();
        $user->update(['password' => $data['password']]);

        $account->forceFill(['has_custom_password' => true])->save();

        Auth::logoutOtherDevices($data['password']);

        return to_route('profile.index')->with('success', trans('messages.profile.updated'));
    }

    /**
     * Redirect to Discord to confirm the user's identity in place of a password,
     * for accounts that have no custom password set.
     */
    public function redirectConfirm(Request $request)
    {
        $account = $request->user()->discordAccount;

        // Only accounts without a real password may substitute Discord for the
        // password confirmation; accounts with one must confirm with it.
        abort_if($account === null || $account->has_custom_password, 404);

        return Socialite::driver('discord')
            ->scopes(['identify'])
            ->redirectUrl(route('discord-login.confirm.callback'))
            ->redirect();
    }

    /**
     * Handle the Discord confirmation callback, standing in for a password
     * confirmation (Illuminate\Auth\Middleware\RequirePassword).
     */
    public function confirmCallback(Request $request): Response
    {
        $account = $request->user()->discordAccount;

        abort_if($account === null || $account->has_custom_password, 404);

        $discordUser = Socialite::driver('discord')
            ->scopes(['identify'])
            ->redirectUrl(route('discord-login.confirm.callback'))
            ->user();

        if ((string) $discordUser->getId() !== (string) $account->discord_user_id) {
            return to_route('password.confirm')->with('error', trans('discord-login::messages.confirm.mismatch'));
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home'));
    }

    /**
     * Build the Discord Socialite driver with this plugin's own callback and scopes,
     * reusing the client_id/client_secret already configured for role linking.
     */
    protected function driver()
    {
        return Socialite::driver('discord')
            ->scopes(['identify', 'email'])
            ->redirectUrl(route('discord-login.callback'));
    }

    /**
     * Retrieve a session payload, discarding it if it has expired.
     */
    protected function pending(Request $request, string $key): ?array
    {
        $data = $request->session()->get($key);

        if ($data === null) {
            return null;
        }

        if (now()->timestamp - Arr::get($data, 'created_at', 0) > self::PENDING_LIFETIME) {
            $request->session()->forget($key);

            return null;
        }

        return $data;
    }

    /**
     * Log in the user behind a linked Discord account, honoring bans, maintenance
     * mode and the per-account 2FA bypass setting.
     */
    protected function loginAccount(Request $request, DiscordAccount $account, ?string $discordEmail): Response
    {
        $user = $account->user;

        // Same gates as the core password login: deleted accounts (stale
        // discord_accounts rows from before this plugin cleaned them up) and
        // admin-forced password resets must not be bypassable via Discord.
        if ($user === null || $user->isDeleted()) {
            return to_route('login')->with('error', trans('auth.failed'));
        }

        if ($user->mustChangePassword()) {
            return to_route('login')->with('error', trans('passwords.change'));
        }

        if ($user->isBanned()) {
            return to_route('login')->with('error', trans('auth.suspended'));
        }

        if ($this->isMaintenance($user)) {
            return to_route('login')->with('error', trans('auth.maintenance'));
        }

        if ($user->hasTwoFactorAuth() && ! $account->bypass_2fa) {
            $request->session()->put('login.2fa', [
                'id' => $user->id,
                'remember' => true,
            ]);

            return to_route('login.2fa');
        }

        Auth::login($user, true);

        $user->forceFill([
            'last_login_ip' => $request->ip(),
            'last_login_at' => now(),
        ])->save();

        ActionLog::log('users.login', null, [
            'ip' => $request->ip(),
            '2fa' => $user->hasTwoFactorAuth() ? 'on' : 'off',
        ]);

        // The shared layout only supports "success"/"error" flash messages, so the
        // email mismatch is surfaced as the login's success message rather than
        // blocking the login (as requested: warn, but let the user in).
        $message = ($discordEmail !== null && $discordEmail !== $user->email)
            ? trans('discord-login::messages.email_mismatch')
            : trans('messages.status.success');

        return to_route('home')->with('success', $message);
    }

    protected function isMaintenance(User $user): bool
    {
        if (! setting('maintenance.enabled', false)) {
            return false;
        }

        if ($user->can('maintenance.access')) {
            return false;
        }

        $paths = setting('maintenance.paths', []);

        if (empty($paths)) {
            return true;
        }

        return Arr::first($paths, function (string $path) {
            return Str::startsWith(trim($path, '/'), 'user/login');
        }) !== null;
    }
}
