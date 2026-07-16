<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'Aquest compte de Discord ja està vinculat a un altre compte.',
    'email_mismatch' => "Inici de sessió correcte. Avís: l'adreça de correu del teu compte de Discord no coincideix amb la del teu compte.",
    'password_login_disabled' => 'Aquest compte no té cap contrasenya definida: inicia sessió amb Discord.',
    'guild_required' => 'Has de unir-te al nostre servidor de Discord abans de poder iniciar sessió o registrar-te amb Discord.',
    'guild_notice' => "Hauràs d'unir-te al nostre servidor de Discord per vincular el teu compte.",

    'login' => [
        'button' => 'Inicia sessió amb Discord',
    ],

    'register' => [
        'button' => 'Registra\'t amb Discord',
        'title' => 'Completa el teu registre',
        'not_found' => 'Encara no hi ha cap compte vinculat a aquest Discord. Completa la informació següent per crear el teu compte.',
        'duplicate_notice' => 'Aquest compte de Discord ja està vinculat a un altre compte, però has decidit crear-ne un de nou igualment. Completa la informació següent.',
        'email_help' => 'El correu del teu compte de Discord, utilitzat per al teu compte.',
        'password_optional' => 'Contrasenya (opcional)',
        'password_help' => 'Si no defineixes una contrasenya, només podràs iniciar sessió a través de Discord (pots definir-ne una més tard des del teu perfil).',
        'submit' => 'Crea el meu compte',
        'email_used' => 'Aquesta adreça de correu ja és utilitzada per un altre compte.',
    ],

    'choose' => [
        'title' => 'Diversos comptes estan vinculats a aquest Discord',
        'description' => 'Tria a quin compte vols iniciar sessió.',
    ],

    'conflict' => [
        'title' => 'Aquest Discord ja està vinculat',
        'already_linked' => 'Aquest compte de Discord ja està vinculat a un compte existent del lloc. Pots iniciar sessió amb aquest compte, o crear-ne un de nou si els duplicats estan permesos.',
        'login' => 'Inicia sessió amb el compte existent',
        'register' => 'Crea un compte nou igualment',
    ],

    'confirm' => [
        'description' => 'El teu compte no té contrasenya: confirma la teva identitat tornant a iniciar sessió a Discord.',
        'button' => 'Confirma amb Discord',
        'mismatch' => 'Aquest no és el compte de Discord vinculat al teu perfil.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Inici de sessió amb Discord vinculat a :name.',
        'bypass_2fa' => "Permet que l'inici de sessió amb Discord ometi l'autenticació de dos factors",
        'no_password' => 'El teu compte no té cap contrasenya definida. Pots crear-ne una aquí per poder iniciar sessió també sense Discord.',
        'set_password' => 'Defineix una contrasenya',
        'unlink_locked' => "Has de definir una contrasenya abans de desvincular el teu compte de Discord, altrament ja no podries iniciar sessió amb el teu compte.",
    ],

    'tools' => [
        'recovery_dm' => "Hola! Un administrador de :site ha generat una nova contrasenya per al teu compte:\n\n:password\n\nSe't demanarà que la canviïs la propera vegada que iniciïs sessió amb ella.",
        'recovery_codes_dm' => "Hola! Un administrador de :site ha regenerat els teus codis de recuperació d'autenticació de dos factors. Els teus codis anteriors ja no funcionen. Aquí tens els nous codis — guarda'ls en un lloc segur:\n\n:codes",
    ],
];
