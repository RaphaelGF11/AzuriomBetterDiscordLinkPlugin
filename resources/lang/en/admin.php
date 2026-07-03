<?php

return [
    'permission' => 'Manage Discord login settings',
    'allow_duplicates' => 'Allow duplicate Discord links',
    'allow_duplicates_help' => "If enabled, the same Discord account can be linked to several site accounts; at login, the user will choose which account to log into. If disabled, linking is refused if that Discord is already linked to another account.",

    'info' => [
        'setup' => 'This plugin reuses the Discord application configured in <a href=":url">Roles management &rarr; Link roles with Discord</a> (client ID / client secret). Set it up there first if you haven\'t already.',
        'redirect_intro' => 'In the <b>Discord developer portal</b>, under <b>OAuth2</b> &rarr; <b>General</b>, additionally add these URLs to the <b>Redirects</b> (on top of the profile link one):',
    ],
];
