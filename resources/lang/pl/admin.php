<?php

return [
    'permission' => 'Zarządzaj ustawieniami logowania przez Discord',
    'allow_duplicates' => 'Zezwól na duplikaty powiązań Discord',
    'allow_duplicates_help' => 'Jeśli włączone, to samo konto Discord może być powiązane z wieloma kontami na stronie; podczas logowania użytkownik wybierze, na które konto się zalogować. Jeśli wyłączone, powiązanie zostanie odrzucone, jeśli ten Discord jest już powiązany z innym kontem.',
    'allow_passwordless' => 'Zezwól na tworzenie kont bez hasła',
    'allow_passwordless_help' => 'Jeśli włączone, hasło jest opcjonalne podczas rejestracji przez Discord (konto będzie mogło logować się wyłącznie przez Discord, dopóki hasło nie zostanie ustawione w profilu). Jeśli wyłączone, do utworzenia konta przez Discord wymagane jest hasło.',
    'http_warning' => 'Ta strona jest ładowana przez HTTP (niezabezpieczone). Discord akceptuje wyłącznie adresy URL przekierowania HTTPS, z wyjątkiem localhost/127.0.0.1 dla lokalnego programowania. Wywołania zwrotne (callback) nie powiodą się, dopóki strona nie będzie obsługiwana przez HTTPS.',
    'custom_credentials' => 'Użyj dedykowanych danych uwierzytelniających Discord',
    'custom_credentials_help' => 'Jeśli włączone, ta wtyczka użyje poniższego client ID / secret zamiast tych skonfigurowanych w zarządzaniu rolami. Wymienione powyżej adresy URL przekierowania trzeba będzie wtedy dodać do tej dedykowanej aplikacji Discord.',
    'bot_token' => 'Token bota',
    'bot_token_help' => 'Token bota Discord zaproszonego na Twój serwer(y) z uprawnieniami „Zarządzaj rolami” i „Twórz natychmiastowe zaproszenie”. Wymagany dla narzędzi administracyjnych Discord, synchronizacji ról oraz opcji „Ogranicz do członków serwera” poniżej — w przeciwnym razie opcjonalny.',
    'bot_token_shared_help' => 'Obecnie ponownie wykorzystywany jest token bota już skonfigurowany na stronie Zarządzanie rolami &rarr; Powiąż role z Discord. Włącz powyżej „Użyj dedykowanych danych uwierzytelniających Discord”, aby użyć innego bota.',
    'customizable_email' => 'Zezwól na konfigurowalny e-mail rejestracyjny',
    'customizable_email_help' => 'Jeśli włączone, użytkownik może wybrać inny adres e-mail niż jego adres Discord podczas kończenia rejestracji, zamiast być ograniczonym do adresu e-mail Discord. Nie można włączyć jednocześnie z opcją "Dopasowuj konta na podstawie adresu e-mail".',
    'match_by_email' => 'Dopasowuj konta na podstawie adresu e-mail',
    'match_by_email_help' => 'Jeśli włączone, gdy żadne konto nie jest powiązane z tym Discordem, logowanie spróbuje znaleźć konto na stronie, którego adres e-mail zgadza się z (zweryfikowanym) e-mailem Discord. Jawne powiązania zawsze mają pierwszeństwo.',
    'incompatible_with_match_by_email' => 'Tego ustawienia nie można włączyć jednocześnie z „:option”.',
    'sync_avatar' => 'Synchronizuj awatar z Discord',
    'sync_avatar_help' => 'Jeśli włączone, awatar użytkownika na stronie jest ustawiany na jego awatar Discord przy każdym logowaniu/rejestracji, a także za każdym razem, gdy administrator użyje poniżej opcji „Odśwież informacje z Discord”.',
    'required_guild' => 'Ogranicz do członków serwera',
    'required_guild_help' => 'Jeśli ustawiono ID serwera, logowanie lub rejestracja przez Discord wymaga bycia członkiem tego serwera — użytkownik zostaje do niego automatycznie dodany (jego zgodę na uprawnienie „guilds.join” prosi sam Discord na ekranie autoryzacji), jeśli jeszcze nim nie jest. Wymaga tokenu bota powyżej, zaproszonego na ten serwer z uprawnieniem „Twórz natychmiastowe zaproszenie”. Pozostaw ID serwera puste, aby wyłączyć to ograniczenie.',
    'required_guild_id' => 'ID serwera',
    'bypass_maintenance' => 'Zezwól na logowanie przez Discord podczas konserwacji',
    'bypass_maintenance_help' => 'Jeśli włączone, logowanie przez Discord pozostaje możliwe nawet podczas aktywnego trybu konserwacji, bez konieczności posiadania uprawnienia dostępu do konserwacji. Jeśli wyłączone, obowiązują te same zasady co przy klasycznym logowaniu.',

    'users' => [
        'no_password_warning' => 'To konto nie ma ustawionego hasła. Obecnie można się zalogować wyłącznie przez Discord. Ustawienie hasła poniżej włączy również klasyczne logowanie hasłem.',
        'no_password_error' => 'To konto nie ma ustawionego hasła. Obecnie w ogóle nie może się zalogować. Ustawienie hasła poniżej włączy klasyczne logowanie hasłem.',
    ],

    'force_unlink' => [
        'button' => 'Odłącz (zablokuje konto)',
        'title' => 'Odłączyć to konto Discord bez hasła?',
        'warning' => 'To połączenie z Discordem jest obecnie jedynym sposobem logowania się na to konto. Odłączenie go zablokuje konto, dopóki nie zostanie mu ustawione hasło poniżej — nie dzieje się to automatycznie.',
        'confirm' => 'Odłącz mimo to',
    ],

    'tools' => [
        'title' => 'Narzędzia Discord',
        'bot_unavailable' => 'Skonfiguruj token bota w ustawieniach wtyczki, aby odblokować wysyłanie wiadomości prywatnej, hasła odzyskiwania lub kodów odzyskiwania 2FA.',

        'dm' => [
            'button' => 'Wyślij wiadomość prywatną',
            'title' => 'Wyślij wiadomość prywatną Discord',
            'content_label' => 'Wiadomość',
            'confirm' => 'Wyślij',
            'sent' => 'Wiadomość została wysłana.',
            'failed' => 'Nie udało się wysłać wiadomości — bot i ten użytkownik mogą nie mieć wspólnego serwera, lub użytkownik ma wyłączone wiadomości prywatne.',
        ],

        'recovery_password' => [
            'button' => 'Wyślij hasło odzyskiwania',
            'title' => 'Wyślij hasło odzyskiwania',
            'warning' => 'To generuje nowe losowe hasło, wymusza jego zmianę przy następnym logowaniu i wysyła je do użytkownika przez wiadomość prywatną Discord.',
            'invalidate_sessions' => 'Wyloguj też ze wszystkich obecnie otwartych sesji',
            'invalidate_sessions_help' => 'Odnawia token „zapamiętaj mnie”, a dodatkowo od razu czyści sesje użytkownika, jeśli strona używa sterownika sesji bazy danych. Przy innych sterownikach sesji już otwarte sesje mogą pozostać zalogowane aż do własnego wygaśnięcia.',
            'confirm' => 'Wyślij',
            'sent' => 'Hasło odzyskiwania zostało wygenerowane i wysłane.',
        ],

        'refresh' => [
            'button' => 'Odśwież informacje z Discord',
            'title' => 'Odśwież informacje z Discord',
            'description' => 'Pobiera z Discord aktualną nazwę użytkownika (i awatar, jeśli synchronizacja awatara jest włączona) tego użytkownika, na wypadek gdyby zmienił je tam.',
            'confirm' => 'Odśwież',
            'done' => 'Informacje z Discord zostały odświeżone.',
            'failed' => 'Nie udało się połączyć z Discord, aby odświeżyć informacje tego konta.',
        ],

        'recovery_codes' => [
            'button' => 'Wyślij kody odzyskiwania 2FA',
            'title' => 'Wyślij kody odzyskiwania 2FA',
            'warning' => 'To zastępuje istniejące kody odzyskiwania dwuskładnikowego użytkownika nowym zestawem i wysyła je przez wiadomość prywatną Discord. Stare kody natychmiast przestają działać.',
            'confirm' => 'Wyślij',
            'sent' => 'Nowe kody odzyskiwania zostały wygenerowane i wysłane.',
        ],
    ],

    'role_sync' => [
        'title' => 'Synchronizacja ról Discord',
        'description' => 'Automatycznie przyznaje rolę serwera Discord użytkownikom spełniającym warunki reguły i odbiera ją, gdy przestają je spełniać (sprawdzane w czasie rzeczywistym przy istotnych zmianach oraz według harmonogramu, aby wyłapać też przypadki takie jak wygasła subskrypcja).',
        'bot_unavailable' => 'Skonfiguruj token bota w ustawieniach powyżej, aby odblokować synchronizację ról Discord.',
        'create' => 'Utwórz regułę',
        'edit' => 'Edytuj regułę',
        'empty' => 'Brak jeszcze reguł synchronizacji.',
        'guild_id' => 'ID serwera',
        'role_id' => 'ID roli',
        'conditions' => 'Warunki',
        'condition_site_roles' => 'Rola na stronie: :roles',
        'condition_shop_package' => 'Posiada produkt: :package',
        'condition_balance' => 'Saldo między :min a :max',
        'no_conditions' => 'Brak (dotyczy wszystkich)',
        'conditions_title' => 'Warunki',
        'conditions_help' => 'Aby ta reguła przyznała swoją rolę, wszystkie poniższe ustawione warunki muszą być spełnione razem. Pozostaw warunek pusty/niewybrany, aby go nie sprawdzać. Kilka reguł może celować w tę samą rolę serwera: wystarczy spełnić jedną z nich, aby ją otrzymać.',
        'condition_site_roles_label' => 'Ogranicz do określonych ról na stronie',
        'condition_site_roles_help' => 'Pozostaw wszystkie pola niezaznaczone, aby nie sprawdzać tego warunku.',
        'condition_shop_package_label' => 'Wymaga posiadania tego produktu ze sklepu',
        'no_condition' => 'Nie sprawdzaj tego warunku',
        'balance_min' => 'Minimalne saldo',
        'balance_max' => 'Maksymalne saldo',
        'discord_role_title' => 'Rola Discord do przyznania',
    ],

    'email_warning' => [
        'title' => 'Ostrzeżenie dotyczące bezpieczeństwa',
        'body' => 'Dopasowywanie kont na podstawie adresu e-mail jest mniej bezpieczne niż na podstawie ID Discord: każdy, kto kontroluje zweryfikowany adres e-mail na Discordzie, będzie mógł zalogować się na konto strony powiązane z tym adresem, mimo że nigdy nie dokonano żadnego powiązania. Jeśli konto e-mail zostanie przejęte lub ponownie użyte, dotyczy to również konta na stronie. Włącz tę opcję tylko wtedy, gdy rozumiesz to ryzyko.',
        'confirm' => 'Rozumiem ryzyko',
    ],

    'info' => [
        'setup' => 'Ta wtyczka wykorzystuje ponownie aplikację Discord skonfigurowaną w <a href=":url">Zarządzanie rolami &rarr; Powiąż role z Discord</a> (client ID / client secret). Skonfiguruj ją tam najpierw, jeśli jeszcze tego nie zrobiłeś.',
        'redirect_intro' => 'W <b>portalu deweloperskim Discord</b>, w sekcji <b>OAuth2</b> &rarr; <b>General</b>, dodaj dodatkowo te adresy URL do <b>Redirects</b> (oprócz tego dla powiązania profilu):',
    ],

    'test' => [
        'title' => 'Przetestuj konfigurację',
        'description' => 'Sprawdź, czy client ID/secret są prawidłowe, a następnie wykonaj rzeczywiste testowe logowanie, aby potwierdzić, że adresy URL przekierowania są rzeczywiście zarejestrowane w Discord (to jedyny niezawodny sposób weryfikacji: Discord waliduje je dopiero na ekranie autoryzacji, a nie wcześniej).',
        'credentials_button' => 'Sprawdź client ID / secret',
        'bot_token_button' => 'Sprawdź token bota',
        'bot_token_ok' => 'Token bota jest prawidłowy.',
        'bot_token_invalid' => 'Token bota jest brakujący lub nieprawidłowy.',
        'callback_button_login' => 'Przetestuj callback logowania',
        'callback_button_confirm' => 'Przetestuj callback potwierdzenia',
        'callback_help' => 'Te przyciski faktycznie przekierowują Cię do Discord, używając dwóch adresów URL wymienionych powyżej. Jeśli wrócisz na tę stronę z komunikatem o powodzeniu, potwierdza to, że testowany adres URL jest zarejestrowany. Jeśli Discord wyświetli błąd „invalid redirect_uri” jeszcze przed poproszeniem o zalogowanie, ten adres URL jest brakujący lub nieprawidłowy.',
        'not_configured' => 'Nie skonfigurowano żadnego client ID / secret Discord. Skonfiguruj je najpierw w zarządzaniu rolami.',
        'network_error' => 'Nie udało się połączyć z API Discord. Spróbuj ponownie później.',
        'credentials_invalid' => 'Client ID lub client secret jest nieprawidłowy.',
        'credentials_ok' => 'Client ID i client secret są prawidłowe.',
        'callback_failed' => 'Test nie powiódł się. Sprawdź, czy testowany adres URL przekierowania jest zarejestrowany w Discord i czy client secret jest poprawny.',
        'callback_ok' => 'Test zakończony sukcesem jako :name — ten adres URL przekierowania jest prawidłowo zarejestrowany w Discord.',
    ],
];
