<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'Ez a Discord-fiók már össze van kapcsolva egy másik fiókkal.',
    'email_mismatch' => 'Sikeres bejelentkezés. Figyelmeztetés: a Discord-fiókod e-mail címe nem egyezik a fiókod e-mail címével.',
    'password_login_disabled' => 'Ehhez a fiókhoz nincs jelszó beállítva: jelentkezz be helyette Discorddal.',
    'guild_required' => 'Csatlakoznod kell a Discord szerverünkhöz, mielőtt bejelentkezhetnél vagy regisztrálhatnál Discorddal.',
    'guild_notice' => 'A fiókod összekapcsolásához csatlakoznod kell a Discord szerverünkhöz.',

    'login' => [
        'button' => 'Bejelentkezés Discorddal',
    ],

    'register' => [
        'button' => 'Regisztráció Discorddal',
        'title' => 'Fejezd be a regisztrációt',
        'not_found' => 'Ehhez a Discordhoz még nincs fiók összekapcsolva. Töltsd ki az alábbi adatokat a fiókod létrehozásához.',
        'duplicate_notice' => 'Ez a Discord-fiók már össze van kapcsolva egy másik fiókkal, de úgy döntöttél, hogy mégis újat hozol létre. Töltsd ki az alábbi adatokat.',
        'email_help' => 'A Discord-fiókod e-mail címe, amelyet a fiókodhoz használunk.',
        'password_optional' => 'Jelszó (opcionális)',
        'password_help' => 'Ha nem állítasz be jelszót, csak Discorddal tudsz bejelentkezni (később a profilodból beállíthatsz egyet).',
        'submit' => 'Fiók létrehozása',
        'email_used' => 'Ezt az e-mail címet már egy másik fiók használja.',
    ],

    'choose' => [
        'title' => 'Több fiók is össze van kapcsolva ezzel a Discorddal',
        'description' => 'Válaszd ki, melyik fiókba szeretnél bejelentkezni.',
    ],

    'conflict' => [
        'title' => 'Ez a Discord már össze van kapcsolva',
        'already_linked' => 'Ez a Discord-fiók már össze van kapcsolva egy meglévő fiókkal az oldalon. Bejelentkezhetsz abba a fiókba, vagy létrehozhatsz egy újat, ha az ismétlődések engedélyezettek.',
        'login' => 'Bejelentkezés a meglévő fiókba',
        'register' => 'Új fiók létrehozása mégis',
    ],

    'confirm' => [
        'description' => 'A fiókodhoz nincs jelszó: erősítsd meg személyazonosságodat a Discordba való újbóli bejelentkezéssel.',
        'button' => 'Megerősítés Discorddal',
        'mismatch' => 'Ez nem a profilodhoz kapcsolt Discord-fiók.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Discord bejelentkezés összekapcsolva ezzel: :name.',
        'bypass_2fa' => 'Engedélyezze, hogy a Discord bejelentkezés megkerülje a kétfaktoros hitelesítést',
        'no_password' => 'A fiókodhoz nincs jelszó beállítva. Itt létrehozhatsz egyet, hogy Discord nélkül is be tudj jelentkezni.',
        'set_password' => 'Jelszó beállítása',
        'unlink_locked' => 'Először jelszót kell beállítanod, mielőtt leválasztod a Discord-fiókodat, különben nem tudnál többé bejelentkezni a fiókodba.',
    ],

    'tools' => [
        'recovery_dm' => "Szia! A(z) :site egyik adminisztrátora új jelszót generált a fiókodhoz:\n\n:password\n\nA következő bejelentkezéskor meg kell változtatnod.",
        'recovery_codes_dm' => "Szia! A(z) :site egyik adminisztrátora újragenerálta a kétfaktoros helyreállító kódjaidat. A korábbi kódjaid már nem működnek. Íme az új kódjaid - tárold őket biztonságos helyen:\n\n:codes",
    ],
];
