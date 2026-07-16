<?php

namespace Azuriom\Plugin\DiscordLogin\Support;

/**
 * Resolves the Discord application credentials this plugin should use:
 * either the ones shared with the core role-linking system (default),
 * or the plugin's own pair when the dedicated setting is enabled.
 */
class DiscordCredentials
{
    public static function useCustom(): bool
    {
        return (bool) setting('discord-login.use_custom_credentials', false);
    }

    public static function clientId(): ?string
    {
        return static::useCustom()
            ? setting('discord-login.client_id')
            : setting('discord.client_id');
    }

    public static function clientSecret(): ?string
    {
        return static::useCustom()
            ? setting('discord-login.client_secret')
            : setting('discord.client_secret');
    }
}
