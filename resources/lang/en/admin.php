<?php

return [
    'permission' => 'Manage Discord login settings',
    'allow_duplicates' => 'Allow duplicate Discord links',
    'allow_duplicates_help' => "If enabled, the same Discord account can be linked to several site accounts; at login, the user will choose which account to log into. If disabled, linking is refused if that Discord is already linked to another account.",
    'allow_passwordless' => 'Allow passwordless account creation',
    'allow_passwordless_help' => "If enabled, the password is optional when registering with Discord (the account can then only log in via Discord, until a password is set from the profile). If disabled, a password is required to create an account with Discord.",
    'http_warning' => 'This site is loaded over HTTP (not secure). Discord only accepts HTTPS redirect URLs, except for the localhost/127.0.0.1 exception for local development. Callbacks will fail until the site is served over HTTPS.',

    'info' => [
        'setup' => 'This plugin reuses the Discord application configured in <a href=":url">Roles management &rarr; Link roles with Discord</a> (client ID / client secret). Set it up there first if you haven\'t already.',
        'redirect_intro' => 'In the <b>Discord developer portal</b>, under <b>OAuth2</b> &rarr; <b>General</b>, additionally add these URLs to the <b>Redirects</b> (on top of the profile link one):',
    ],

    'test' => [
        'title' => 'Test the configuration',
        'description' => 'Check that the client ID/secret are valid, then run a real test login to confirm the redirect URLs are actually registered on Discord (that\'s the only reliable way to check: Discord only validates them at the authorization screen, not before).',
        'credentials_button' => 'Check client ID / secret',
        'callback_button_login' => 'Test the login callback',
        'callback_button_confirm' => 'Test the confirmation callback',
        'callback_help' => 'These buttons actually redirect you to Discord, using the two URLs listed above. If you come back to this page with a success message, that confirms the tested URL is registered. If Discord shows an "invalid redirect_uri" error before even asking you to log in, that URL is missing or wrong.',
        'not_configured' => 'No Discord client ID / secret is configured. Set them up in Roles management first.',
        'network_error' => 'Could not reach the Discord API. Try again later.',
        'credentials_invalid' => 'The client ID or client secret is incorrect.',
        'credentials_ok' => 'The client ID and client secret are valid.',
        'callback_failed' => 'The test failed. Check that the tested redirect URL is registered on Discord and that the client secret is correct.',
        'callback_ok' => 'Test succeeded as :name — that redirect URL is correctly registered on Discord.',
    ],
];
