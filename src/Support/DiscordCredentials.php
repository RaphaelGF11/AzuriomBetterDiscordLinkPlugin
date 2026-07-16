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

    /**
     * The bot token used for every Bot-authenticated Discord API call this
     * plugin makes (DMs, guild role management, guild membership checks).
     * Shares the same "custom credentials" toggle as the OAuth client id/secret:
     * when off, reuses the bot token already configured for core's Roles
     * management "Link roles with Discord" page (the same Discord application),
     * when on, uses this plugin's own dedicated bot token setting instead.
     */
    public static function botToken(): ?string
    {
        return static::useCustom()
            ? setting('discord-login.bot_token')
            : setting('discord.token');
    }
}
