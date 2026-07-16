<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'Tento účet Discord je již propojen s jiným účtem.',
    'email_mismatch' => 'Přihlášení proběhlo úspěšně. Upozornění: e-mailová adresa vašeho účtu Discord neodpovídá e-mailu vašeho účtu.',
    'password_login_disabled' => 'Tento účet nemá nastavené heslo: přihlaste se místo toho pomocí Discordu.',
    'guild_required' => 'Než se budete moci přihlásit nebo zaregistrovat přes Discord, musíte se připojit k našemu serveru Discord.',
    'guild_notice' => 'Budete se muset připojit k našemu serveru Discord, abyste mohli propojit svůj účet.',

    'login' => [
        'button' => 'Přihlásit se přes Discord',
    ],

    'register' => [
        'button' => 'Zaregistrovat se přes Discord',
        'title' => 'Dokončete svou registraci',
        'not_found' => 'K tomuto Discordu zatím není propojen žádný účet. Vyplňte níže uvedené údaje pro vytvoření účtu.',
        'duplicate_notice' => 'Tento účet Discord je již propojen s jiným účtem, ale přesto jste se rozhodli vytvořit nový. Vyplňte níže uvedené údaje.',
        'email_help' => 'E-mail vašeho účtu Discord, použitý pro váš účet.',
        'password_optional' => 'Heslo (volitelné)',
        'password_help' => 'Pokud nenastavíte heslo, budete se moci přihlásit pouze přes Discord (později jej můžete nastavit ve svém profilu).',
        'submit' => 'Vytvořit účet',
        'email_used' => 'Tato e-mailová adresa je již použita jiným účtem.',
    ],

    'choose' => [
        'title' => 'K tomuto Discordu je propojeno několik účtů',
        'description' => 'Vyberte, ke kterému účtu se chcete přihlásit.',
    ],

    'conflict' => [
        'title' => 'Tento Discord je již propojen',
        'already_linked' => 'Tento účet Discord je již propojen s existujícím účtem na webu. Můžete se přihlásit k tomuto účtu, nebo vytvořit nový, pokud jsou duplicity povoleny.',
        'login' => 'Přihlásit se k existujícímu účtu',
        'register' => 'Přesto vytvořit nový účet',
    ],

    'confirm' => [
        'description' => 'Váš účet nemá heslo: potvrďte svou identitu opětovným přihlášením přes Discord.',
        'button' => 'Potvrdit přes Discord',
        'mismatch' => 'Toto není účet Discord propojený s vaším profilem.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Přihlášení přes Discord propojeno s :name.',
        'bypass_2fa' => 'Povolit přihlášení přes Discord obejít dvoufaktorové ověřování',
        'no_password' => 'Váš účet nemá nastavené heslo. Zde si jej můžete vytvořit, abyste se mohli přihlásit i bez Discordu.',
        'set_password' => 'Nastavit heslo',
        'unlink_locked' => 'Před zrušením propojení účtu Discord musíte nejprve nastavit heslo, jinak byste se již nemohli přihlásit ke svému účtu.',
    ],

    'tools' => [
        'recovery_dm' => "Ahoj! Administrátor webu :site vygeneroval nové heslo pro váš účet:\n\n:password\n\nPři příštím přihlášení s ním budete požádáni o jeho změnu.",
        'recovery_codes_dm' => "Ahoj! Administrátor webu :site znovu vygeneroval vaše záložní kódy dvoufaktorového ověřování. Vaše předchozí kódy již nefungují. Zde jsou vaše nové kódy - uschovejte si je na bezpečném místě:\n\n:codes",
    ],
];
