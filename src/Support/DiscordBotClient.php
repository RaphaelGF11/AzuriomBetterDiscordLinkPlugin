<?php

namespace Azuriom\Plugin\DiscordLogin\Support;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Thin wrapper around the Discord Bot REST API, used for everything the
 * plugin's OAuth-only flows can't do: sending a DM, and assigning/removing
 * or checking a guild member's roles. Every call returns null/false on any
 * failure (missing token, network error, Discord rejecting the request)
 * instead of throwing, so callers can show a translated error message
 * rather than a crash - failures are still logged for diagnosis.
 */
class DiscordBotClient
{
    protected const BASE_URL = 'https://discord.com/api/v10';

    /**
     * Whether a bot token is configured at all (see DiscordCredentials::botToken()).
     */
    public static function available(): bool
    {
        return DiscordCredentials::botToken() !== null;
    }

    /**
     * Verify the configured bot token is valid.
     */
    public static function testToken(): bool
    {
        return static::request('get', '/users/@me') !== null;
    }

    /**
     * Send a direct message to a Discord user. Requires the bot to share at
     * least one guild with that user (a Discord platform constraint, not
     * something this plugin can control) - fails gracefully otherwise.
     */
    public static function sendDirectMessage(string $discordUserId, string $content): bool
    {
        $channel = static::request('post', '/users/@me/channels', ['recipient_id' => $discordUserId]);

        $channelId = $channel?->json('id');

        if ($channelId === null) {
            return false;
        }

        return static::request('post', "/channels/{$channelId}/messages", ['content' => $content]) !== null;
    }

    /**
     * Assign a guild role to a member. Requires the bot to have the "Manage
     * Roles" permission in that guild, with a role position above the target role.
     */
    public static function assignRole(string $guildId, string $discordUserId, string $roleId): bool
    {
        return static::request('put', "/guilds/{$guildId}/members/{$discordUserId}/roles/{$roleId}") !== null;
    }

    /**
     * Remove a guild role from a member.
     */
    public static function removeRole(string $guildId, string $discordUserId, string $roleId): bool
    {
        return static::request('delete', "/guilds/{$guildId}/members/{$discordUserId}/roles/{$roleId}") !== null;
    }

    /**
     * The role IDs currently held by a guild member, or null if the request
     * failed or the user isn't a member of that guild.
     *
     * @return string[]|null
     */
    public static function guildMemberRoles(string $guildId, string $discordUserId): ?array
    {
        return static::request('get', "/guilds/{$guildId}/members/{$discordUserId}")?->json('roles');
    }

    /**
     * Add a user to a guild using their own OAuth access token (obtained with
     * the "guilds.join" scope). Requires the bot to already be a member of
     * that guild with the "Create Instant Invite" permission.
     */
    public static function addGuildMember(string $guildId, string $discordUserId, string $userAccessToken): bool
    {
        return static::request('put', "/guilds/{$guildId}/members/{$discordUserId}", [
            'access_token' => $userAccessToken,
        ]) !== null;
    }

    /**
     * Perform a Bot-authenticated request, returning the response on success
     * or null on any failure (missing token, network error, non-2xx status).
     */
    protected static function request(string $method, string $path, array $payload = []): ?Response
    {
        $token = DiscordCredentials::botToken();

        if ($token === null) {
            return null;
        }

        try {
            $response = Http::withToken($token, 'Bot')
                ->acceptJson()
                ->timeout(10)
                ->{$method}(self::BASE_URL.$path, $payload);
        } catch (Throwable $e) {
            report($e);

            return null;
        }

        if ($response->failed()) {
            Log::warning('discord-login: Discord Bot API call failed', [
                'method' => $method,
                'path' => $path,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return null;
        }

        return $response;
    }
}
