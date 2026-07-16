<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'To konto Discord jest już powiązane z innym kontem.',
    'email_mismatch' => 'Logowanie powiodło się. Uwaga: adres e-mail Twojego konta Discord nie zgadza się z adresem e-mail Twojego konta.',
    'password_login_disabled' => 'To konto nie ma ustawionego hasła: zaloguj się zamiast tego przez Discord.',
    'guild_required' => 'Musisz dołączyć do naszego serwera Discord, zanim będziesz mógł zalogować się lub zarejestrować przez Discord.',
    'guild_notice' => 'Aby powiązać swoje konto, będziesz musiał dołączyć do naszego serwera Discord.',

    'login' => [
        'button' => 'Zaloguj się przez Discord',
    ],

    'register' => [
        'button' => 'Zarejestruj się przez Discord',
        'title' => 'Dokończ rejestrację',
        'not_found' => 'Żadne konto nie jest jeszcze powiązane z tym Discordem. Uzupełnij poniższe informacje, aby utworzyć konto.',
        'duplicate_notice' => 'To konto Discord jest już powiązane z innym kontem, ale mimo to zdecydowałeś się utworzyć nowe. Uzupełnij poniższe informacje.',
        'email_help' => 'E-mail Twojego konta Discord, używany do Twojego konta.',
        'password_optional' => 'Hasło (opcjonalne)',
        'password_help' => 'Jeśli nie ustawisz hasła, będziesz mógł logować się wyłącznie przez Discord (możesz je ustawić później w profilu).',
        'submit' => 'Utwórz moje konto',
        'email_used' => 'Ten adres e-mail jest już używany przez inne konto.',
    ],

    'choose' => [
        'title' => 'Z tym Discordem powiązanych jest kilka kont',
        'description' => 'Wybierz, na które konto chcesz się zalogować.',
    ],

    'conflict' => [
        'title' => 'Ten Discord jest już powiązany',
        'already_linked' => 'To konto Discord jest już powiązane z istniejącym kontem na stronie. Możesz zalogować się na to konto lub utworzyć nowe, jeśli duplikaty są dozwolone.',
        'login' => 'Zaloguj się na istniejące konto',
        'register' => 'Mimo to utwórz nowe konto',
    ],

    'confirm' => [
        'description' => 'Twoje konto nie ma hasła: potwierdź swoją tożsamość, logując się ponownie do Discord.',
        'button' => 'Potwierdź przez Discord',
        'mismatch' => 'To nie jest konto Discord powiązane z Twoim profilem.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Logowanie przez Discord powiązane z :name.',
        'bypass_2fa' => 'Zezwól logowaniu przez Discord na pominięcie uwierzytelniania dwuskładnikowego',
        'no_password' => 'Twoje konto nie ma ustawionego hasła. Możesz je tutaj utworzyć, aby móc logować się także bez Discord.',
        'set_password' => 'Ustaw hasło',
        'unlink_locked' => 'Musisz najpierw ustawić hasło, zanim odłączysz swoje konto Discord, w przeciwnym razie nie będziesz mógł już zalogować się na swoje konto.',
    ],

    'tools' => [
        'recovery_dm' => "Cześć! Administrator :site wygenerował nowe hasło do Twojego konta:\n\n:password\n\nPrzy następnym logowaniu z jego użyciem zostaniesz poproszony o jego zmianę.",
        'recovery_codes_dm' => "Cześć! Administrator :site ponownie wygenerował Twoje kody odzyskiwania uwierzytelniania dwuskładnikowego. Twoje poprzednie kody już nie działają. Oto Twoje nowe kody — przechowuj je w bezpiecznym miejscu:\n\n:codes",
    ],
];
