<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'Detta Discord-konto är redan kopplat till ett annat konto.',
    'email_mismatch' => 'Inloggningen lyckades. Varning: e-postadressen för ditt Discord-konto matchar inte e-postadressen för ditt konto.',
    'password_login_disabled' => 'Detta konto har inget lösenord: logga in med Discord istället.',
    'guild_required' => 'Du måste gå med i vår Discord-server innan du kan logga in eller registrera dig med Discord.',
    'guild_notice' => 'Du behöver gå med i vår Discord-server för att koppla ditt konto.',

    'login' => [
        'button' => 'Logga in med Discord',
    ],

    'register' => [
        'button' => 'Registrera dig med Discord',
        'title' => 'Slutför din registrering',
        'not_found' => 'Inget konto är ännu kopplat till denna Discord. Fyll i informationen nedan för att skapa ditt konto.',
        'duplicate_notice' => 'Detta Discord-konto är redan kopplat till ett annat konto, men du valde att ändå skapa ett nytt. Fyll i informationen nedan.',
        'email_help' => 'E-postadressen för ditt Discord-konto, används för ditt konto.',
        'password_optional' => 'Lösenord (valfritt)',
        'password_help' => 'Om du inte anger ett lösenord kan du bara logga in via Discord (du kan ange ett senare från din profil).',
        'submit' => 'Skapa mitt konto',
        'email_used' => 'Denna e-postadress används redan av ett annat konto.',
    ],

    'choose' => [
        'title' => 'Flera konton är kopplade till denna Discord',
        'description' => 'Välj vilket konto du vill logga in på.',
    ],

    'conflict' => [
        'title' => 'Denna Discord är redan kopplad',
        'already_linked' => 'Detta Discord-konto är redan kopplat till ett befintligt konto på webbplatsen. Du kan logga in på det kontot eller skapa ett nytt om dubbletter är tillåtna.',
        'login' => 'Logga in på befintligt konto',
        'register' => 'Skapa ändå ett nytt konto',
    ],

    'confirm' => [
        'description' => 'Ditt konto har inget lösenord: bekräfta din identitet genom att logga in på Discord igen.',
        'button' => 'Bekräfta med Discord',
        'mismatch' => 'Detta är inte det Discord-konto som är kopplat till din profil.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Discord-inloggning kopplad till :name.',
        'bypass_2fa' => 'Tillåt att Discord-inloggning kringgår tvåfaktorsautentisering',
        'no_password' => 'Ditt konto har inget lösenord. Du kan skapa ett här för att även kunna logga in utan Discord.',
        'set_password' => 'Ange ett lösenord',
        'unlink_locked' => 'Du måste ange ett lösenord innan du kopplar bort ditt Discord-konto, annars skulle du inte längre kunna logga in på ditt konto.',
    ],

    'tools' => [
        'recovery_dm' => "Hej! En administratör på :site genererade ett nytt lösenord för ditt konto:\n\n:password\n\nDu kommer att ombes ändra det nästa gång du loggar in med det.",
        'recovery_codes_dm' => "Hej! En administratör på :site genererade om dina tvåfaktors-återställningskoder. Dina tidigare koder fungerar inte längre. Här är dina nya koder - förvara dem på ett säkert ställe:\n\n:codes",
    ],
];
