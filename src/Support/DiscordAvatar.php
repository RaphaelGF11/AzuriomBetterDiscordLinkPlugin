<?php

namespace Azuriom\Plugin\DiscordIntegration\Support;

class DiscordAvatar
{
    /**
     * Build a Discord CDN avatar URL from a raw Discord user payload (or the
     * subset of it this plugin stores in session between requests: 'id',
     * 'avatar', 'discriminator'), keeping the literal "{size}" token so it
     * matches Azuriom's own convention for URL-based avatars - see
     * User::getAvatar()'s str_replace('{size}', $size, $this->avatar) in
     * app/Models/User.php.
     */
    public static function urlFrom(array $discordUser): string
    {
        $id = $discordUser['id'];
        $hash = $discordUser['avatar'] ?? null;

        if ($hash !== null) {
            $extension = str_starts_with($hash, 'a_') ? 'gif' : 'png';

            return "https://cdn.discordapp.com/avatars/{$id}/{$hash}.{$extension}?size={size}";
        }

        // No custom avatar: fall back to Discord's own default avatar, using
        // the legacy discriminator-based index if the account still has one,
        // or the modern (id >> 22) % 6 formula for migrated "username-only" accounts.
        $discriminator = (int) ($discordUser['discriminator'] ?? 0);

        $index = $discriminator > 0
            ? $discriminator % 5
            : ((int) $id >> 22) % 6;

        return "https://cdn.discordapp.com/embed/avatars/{$index}.png";
    }
}
