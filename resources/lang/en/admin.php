<?php

return [
    'nav' => [
        'configuration' => 'Configuration',
        'authentication' => 'Authentication',
        'roles' => 'Roles',
    ],

    'permission' => 'Manage Discord login settings',
    'enabled' => 'Enable Discord authentication',
    'enabled_help' => 'If disabled, the "Log in with Discord" / "Sign up with Discord" buttons are hidden and the underlying routes refuse to complete a login or registration, without touching the configured credentials below.',
    'allow_duplicates' => 'Allow duplicate Discord links',
    'allow_duplicates_help' => "If enabled, the same Discord account can be linked to several site accounts; at login, the user will choose which account to log into. If disabled, linking is refused if that Discord is already linked to another account.",
    'allow_passwordless' => 'Allow passwordless account creation',
    'allow_passwordless_help' => "If enabled, the password is optional when registering with Discord (the account can then only log in via Discord, until a password is set from the profile). If disabled, a password is required to create an account with Discord.",
    'http_warning' => 'This site is loaded over HTTP (not secure). Discord only accepts HTTPS redirect URLs, except for the localhost/127.0.0.1 exception for local development. Callbacks will fail until the site is served over HTTPS.',
    'custom_credentials' => 'Use dedicated Discord credentials',
    'custom_credentials_help' => 'If enabled, this plugin will use the client ID / secret below instead of the ones configured in Roles management. The redirect URLs listed above must then be added to that dedicated Discord application.',
    'bot_token' => 'Bot token',
    'bot_token_help' => 'The token of a Discord bot invited to your server(s) with the "Manage Roles" and "Create Instant Invite" permissions. Needed for the admin Discord tools, role sync, and the "restrict to server members" option below - optional otherwise.',
    'bot_token_shared_help' => 'Currently reusing the bot token already configured on the Roles management &rarr; Link roles with Discord page. Enable "Use dedicated Discord credentials" above to use a different bot instead.',
    'customizable_email' => 'Allow a customizable registration email',
    'customizable_email_help' => 'If enabled, the user can pick a different email address than their Discord one while completing registration, instead of being locked to the Discord email. Cannot be enabled together with "Match accounts by email address".',
    'match_by_email' => 'Match accounts by email address',
    'match_by_email_help' => 'If enabled, when no account is linked to that Discord, the login will try to find a site account whose email address matches the (verified) Discord email. Explicit links always take priority.',
    'incompatible_with_match_by_email' => 'This setting cannot be enabled at the same time as ":option".',
    'sync_avatar' => 'Sync avatar with Discord',
    'sync_avatar_help' => "If enabled, the user's site avatar is set to their Discord avatar at every login/registration, and whenever an admin uses \"Refresh Discord info\" below.",
    'required_guild' => 'Restrict to members of a server',
    'required_guild_help' => 'If a server ID is set, logging in or registering with Discord requires being a member of that server - the user is automatically added to it (their consent to the "guilds.join" permission is asked by Discord itself, on the authorization screen) if they aren\'t already a member. Requires a bot token above, invited to that server with the "Create Instant Invite" permission. Leave the server ID empty to disable this restriction.',
    'required_guild_id' => 'Server ID',
    'no_required_guild' => 'No restriction',
    'unknown_guild' => 'Unknown server (:id)',
    'bypass_maintenance' => 'Allow Discord login during maintenance',
    'bypass_maintenance_help' => 'If enabled, logging in with Discord stays possible even while maintenance mode is active, without requiring the maintenance access permission. If disabled, it follows the same rules as classic login.',

    'users' => [
        'no_password_warning' => 'This account has no password set. It can currently only log in via Discord. Setting a password below will also enable classic password login.',
        'no_password_error' => 'This account has no password set. It currently cannot log in at all. Setting a password below will enable classic password login.',
    ],

    'force_unlink' => [
        'button' => 'Unlink (locks the account)',
        'title' => 'Unlink this passwordless Discord account?',
        'warning' => "This Discord link is currently this account's only way to log in. Unlinking it will lock the account out until it is given a password below - that isn't done automatically.",
        'confirm' => 'Unlink anyway',
    ],

    'tools' => [
        'title' => 'Discord tools',
        'bot_unavailable' => 'Configure a bot token in the plugin settings to unlock sending a DM, a recovery password, or 2FA recovery codes.',

        'dm' => [
            'button' => 'Send a DM',
            'title' => 'Send a Discord DM',
            'content_label' => 'Message',
            'confirm' => 'Send',
            'sent' => 'The message was sent.',
            'failed' => 'Could not send the message - the bot and this user may not share a server, or the user may have DMs closed.',
        ],

        'recovery_password' => [
            'button' => 'Send a recovery password',
            'title' => 'Send a recovery password',
            'warning' => 'This generates a new random password, forces it to be changed at the next login, and sends it to the user via Discord DM.',
            'invalidate_sessions' => 'Also log out of all currently open sessions',
            'invalidate_sessions_help' => "Rotates the \"remember me\" token, and additionally clears the user's sessions right away if the site uses the database session driver. With other session drivers, already open sessions can stay signed in until they expire on their own.",
            'confirm' => 'Send',
            'sent' => 'The recovery password was generated and sent.',
        ],

        'refresh' => [
            'button' => 'Refresh Discord info',
            'title' => 'Refresh Discord info',
            'description' => "Fetches this user's current Discord username (and avatar, if avatar sync is enabled) from Discord, in case they changed it there.",
            'confirm' => 'Refresh',
            'done' => 'The Discord info was refreshed.',
            'failed' => "Could not reach Discord to refresh this account's info.",
        ],

        'recovery_codes' => [
            'button' => 'Send 2FA recovery codes',
            'title' => 'Send 2FA recovery codes',
            'warning' => "This replaces the user's existing two-factor recovery codes with a fresh set, and sends them via Discord DM. The old codes stop working immediately.",
            'confirm' => 'Send',
            'sent' => 'New recovery codes were generated and sent.',
        ],
    ],

    'role_sync' => [
        'title' => 'Discord role sync',
        'description' => "Automatically grant a Discord server role to users matching a rule's conditions, and remove it once they no longer do (checked in real time on relevant changes, and on a schedule to also catch things like an expired subscription).",
        'bot_unavailable' => 'Configure a bot token in the settings above to unlock Discord role sync.',
        'create' => 'Create a rule',
        'edit' => 'Edit the rule',
        'empty' => 'No role sync rules yet.',
        'guild_id' => 'Server ID',
        'role_id' => 'Role ID',
        'conditions' => 'Conditions',
        'condition_site_roles' => 'Site role: :roles',
        'condition_shop_package' => 'Owns package: :package',
        'condition_balance' => 'Balance between :min and :max',
        'no_conditions' => 'None (matches everyone)',
        'conditions_title' => 'Conditions',
        'conditions_help' => 'All the conditions set below must be met together for this rule to grant its role. Leave a condition empty/unselected to not check it. Several rules can target the same server role: matching any one of them is enough to get it.',
        'condition_site_roles_label' => 'Restrict to certain site roles',
        'condition_site_roles_help' => 'Leave every box unchecked to not check this condition.',
        'condition_shop_package_label' => 'Requires owning this shop package',
        'no_condition' => "Don't check this condition",
        'balance_min' => 'Minimum balance',
        'balance_max' => 'Maximum balance',
        'discord_role_title' => 'Discord role to grant',
    ],

    'email_warning' => [
        'title' => 'Security warning',
        'body' => "Matching accounts by email address is less secure than by Discord ID: anyone who controls a verified email address on Discord will be able to log into the site account bearing that address, without any link ever having been made. If an email account is compromised or recycled, so is the site account. Only enable this option if you understand this risk.",
        'confirm' => 'I understand the risk',
    ],

    'info' => [
        'setup' => 'This plugin reuses the Discord application configured in <a href=":url">Roles management &rarr; Link roles with Discord</a> (client ID / client secret). Set it up there first if you haven\'t already.',
        'redirect_intro' => 'In the <b>Discord developer portal</b>, under <b>OAuth2</b> &rarr; <b>General</b>, additionally add this URL to the <b>Redirects</b> (on top of the profile link one):',
    ],

    'test' => [
        'title' => 'Test the configuration',
        'description' => 'Check that the client ID/secret are valid, then run a real test login to confirm the redirect URLs are actually registered on Discord (that\'s the only reliable way to check: Discord only validates them at the authorization screen, not before).',
        'credentials_button' => 'Check client ID / secret',
        'bot_token_button' => 'Check bot token',
        'bot_token_ok' => 'The bot token is valid.',
        'bot_token_invalid' => 'The bot token is missing or incorrect.',
        'callback_button' => 'Test the callback',
        'callback_help' => 'This button actually redirects you to Discord, using the URL listed above. If you come back to this page with a success message, that confirms the URL is registered. If Discord shows an "invalid redirect_uri" error before even asking you to log in, that URL is missing or wrong.',
        'not_configured' => 'No Discord client ID / secret is configured. Set them up in Roles management first.',
        'network_error' => 'Could not reach the Discord API. Try again later.',
        'credentials_invalid' => 'The client ID or client secret is incorrect.',
        'credentials_ok' => 'The client ID and client secret are valid.',
        'callback_failed' => 'The test failed. Check that the tested redirect URL is registered on Discord and that the client secret is correct.',
        'callback_ok' => 'Test succeeded as :name — that redirect URL is correctly registered on Discord.',
    ],
];
