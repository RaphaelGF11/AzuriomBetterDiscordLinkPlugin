<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'Dit Discord-account is al gekoppeld aan een ander account.',
    'email_mismatch' => 'Aanmelden gelukt. Waarschuwing: het e-mailadres van je Discord-account komt niet overeen met dat van je account.',
    'password_login_disabled' => 'Voor dit account is geen wachtwoord ingesteld: meld je in plaats daarvan aan met Discord.',
    'guild_required' => 'Je moet lid worden van onze Discord-server voordat je kunt inloggen of registreren met Discord.',
    'guild_notice' => 'Je moet lid worden van onze Discord-server om je account te koppelen.',

    'login' => [
        'button' => 'Aanmelden met Discord',
    ],

    'register' => [
        'button' => 'Registreren met Discord',
        'title' => 'Voltooi je registratie',
        'not_found' => 'Er is nog geen account gekoppeld aan deze Discord. Vul onderstaande gegevens in om je account aan te maken.',
        'duplicate_notice' => 'Dit Discord-account is al gekoppeld aan een ander account, maar je hebt ervoor gekozen toch een nieuw account aan te maken. Vul onderstaande gegevens in.',
        'email_help' => 'Het e-mailadres van je Discord-account, gebruikt voor je account.',
        'password_optional' => 'Wachtwoord (optioneel)',
        'password_help' => 'Als je geen wachtwoord instelt, kun je alleen via Discord inloggen (je kunt er later een instellen vanuit je profiel).',
        'submit' => 'Maak mijn account aan',
        'email_used' => 'Dit e-mailadres wordt al gebruikt door een ander account.',
    ],

    'choose' => [
        'title' => 'Meerdere accounts zijn gekoppeld aan deze Discord',
        'description' => 'Kies bij welk account je wilt inloggen.',
    ],

    'conflict' => [
        'title' => 'Deze Discord is al gekoppeld',
        'already_linked' => 'Dit Discord-account is al gekoppeld aan een bestaand account op de site. Je kunt inloggen bij dat account, of een nieuw account aanmaken als duplicaten zijn toegestaan.',
        'login' => 'Inloggen bij bestaand account',
        'register' => 'Toch een nieuw account aanmaken',
    ],

    'confirm' => [
        'description' => 'Je account heeft geen wachtwoord: bevestig je identiteit door opnieuw in te loggen bij Discord.',
        'button' => 'Bevestigen met Discord',
        'mismatch' => 'Dit is niet het Discord-account dat is gekoppeld aan je profiel.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Discord-login gekoppeld aan :name.',
        'bypass_2fa' => 'Sta toe dat Discord-login tweefactorauthenticatie omzeilt',
        'no_password' => 'Voor je account is geen wachtwoord ingesteld. Je kunt er hier een aanmaken om ook zonder Discord te kunnen inloggen.',
        'set_password' => 'Wachtwoord instellen',
        'unlink_locked' => 'Je moet eerst een wachtwoord instellen voordat je de koppeling met je Discord-account kunt verbreken, anders zou je niet meer kunnen inloggen op je account.',
    ],

    'tools' => [
        'recovery_dm' => "Hoi! Een beheerder van :site heeft een nieuw wachtwoord voor je account gegenereerd:\n\n:password\n\nJe wordt gevraagd dit te wijzigen bij je volgende login ermee.",
        'recovery_codes_dm' => "Hoi! Een beheerder van :site heeft je tweefactor-herstelcodes opnieuw gegenereerd. Je vorige codes werken niet meer. Hier zijn je nieuwe codes - bewaar ze op een veilige plek:\n\n:codes",
    ],
];
