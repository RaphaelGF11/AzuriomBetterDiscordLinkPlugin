<?php

namespace Azuriom\Plugin\DiscordLogin\Support;

use Azuriom\Extensions\Plugin\UserProfileCardComposer;
use Illuminate\Support\Facades\Auth;

class DiscordLoginProfileCard extends UserProfileCardComposer
{
    /**
     * Get the cards to add to the user profile.
     *
     * @return array{name: string, view: string, data?: array}[]
     */
    public function getCards()
    {
        $user = Auth::user();
        $account = $user?->discordAccount;

        if ($account === null) {
            return [];
        }

        return [
            [
                'name' => trans('discord-login::messages.profile.title'),
                'view' => 'discord-login::profile.card',
                'data' => [
                    'discordAccount' => $account,
                    'showBypass2fa' => $user->hasTwoFactorAuth(),
                ],
            ],
        ];
    }
}
