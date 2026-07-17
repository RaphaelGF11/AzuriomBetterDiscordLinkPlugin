<?php

namespace Azuriom\Plugin\DiscordIntegration\Support;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Validation\ValidationException;

/**
 * Rejects password logins for accounts that only have the random,
 * unknown-to-anyone password generated at Discord registration time,
 * instead of silently relying on that password being unguessable.
 */
class DiscordOnlyAwareUserProvider extends EloquentUserProvider
{
    /**
     * @param  UserContract  $user
     * @param  array  $credentials
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateCredentials(UserContract $user, #[\SensitiveParameter] array $credentials)
    {
        $account = $user->discordAccount ?? null;

        if ($account !== null && ! $account->has_custom_password) {
            throw ValidationException::withMessages([
                'email' => trans('discord-integration::messages.password_login_disabled'),
            ]);
        }

        return parent::validateCredentials($user, $credentials);
    }
}
