<?php

return [
    'permission' => 'Správa nastavení přihlašování přes Discord',
    'allow_duplicates' => 'Povolit duplicitní propojení s Discordem',
    'allow_duplicates_help' => 'Pokud je povoleno, stejný účet Discord může být propojen s několika účty webu; při přihlašování si uživatel vybere, ke kterému účtu se chce přihlásit. Pokud je zakázáno, propojení je odmítnuto, pokud je tento Discord již propojen s jiným účtem.',
    'allow_passwordless' => 'Povolit vytváření účtů bez hesla',
    'allow_passwordless_help' => 'Pokud je povoleno, heslo je při registraci přes Discord volitelné (účet se pak může přihlásit pouze přes Discord, dokud není heslo nastaveno v profilu). Pokud je zakázáno, je pro vytvoření účtu přes Discord vyžadováno heslo.',
    'http_warning' => 'Tento web je načten přes HTTP (nezabezpečeně). Discord přijímá pouze HTTPS URL adresy pro přesměrování, s výjimkou localhost/127.0.0.1 pro místní vývoj. Callbacky selžou, dokud web nebude poskytován přes HTTPS.',
    'custom_credentials' => 'Použít vyhrazené přihlašovací údaje Discordu',
    'custom_credentials_help' => 'Pokud je povoleno, tento plugin použije níže uvedené client ID / secret místo těch nakonfigurovaných ve správě rolí. Výše uvedené přesměrovací URL adresy pak musí být přidány do této vyhrazené aplikace Discord.',
    'bot_token' => 'Token bota',
    'bot_token_help' => 'Token bota Discord pozvaného na váš server(y) s oprávněními „Spravovat role" a „Vytvořit okamžitou pozvánku". Potřebný pro admin nástroje Discordu, synchronizaci rolí a možnost „Omezit na členy serveru" níže - jinak volitelný.',
    'bot_token_shared_help' => 'Momentálně se znovu používá token bota již nakonfigurovaný na stránce Správa rolí &rarr; Propojit role s Discordem. Aktivujte výše „Použít vyhrazené přihlašovací údaje Discordu" pro použití jiného bota.',
    'customizable_email' => 'Povolit upravitelný e-mail při registraci',
    'customizable_email_help' => 'Pokud je povoleno, může uživatel při dokončování registrace zvolit jinou e-mailovou adresu, než je jeho e-mail na Discordu, místo aby byl vázán na e-mail z Discordu. Nelze povolit současně s možností „Párovat účty podle e-mailové adresy“.',
    'match_by_email' => 'Párovat účty podle e-mailové adresy',
    'match_by_email_help' => 'Pokud je povoleno, když k tomuto Discordu není propojen žádný účet, přihlášení se pokusí najít účet webu, jehož e-mailová adresa odpovídá (ověřenému) e-mailu Discordu. Explicitní propojení mají vždy přednost.',
    'incompatible_with_match_by_email' => 'Toto nastavení nelze povolit současně s „:option“.',
    'sync_avatar' => 'Synchronizovat avatar s Discordem',
    'sync_avatar_help' => 'Pokud je povoleno, avatar uživatele na webu je nastaven na jeho avatar z Discordu při každém přihlášení/registraci a při každém použití „Obnovit informace z Discordu" administrátorem níže.',
    'required_guild' => 'Omezit na členy serveru',
    'required_guild_help' => 'Pokud je nastaveno ID serveru, přihlášení nebo registrace přes Discord vyžaduje členství na tomto serveru - uživatel je do něj automaticky přidán (jeho souhlas s oprávněním „guilds.join" žádá samotný Discord na obrazovce autorizace), pokud jím ještě není. Vyžaduje token bota výše, pozvaného na tento server s oprávněním „Vytvořit okamžitou pozvánku". Ponechte ID serveru prázdné pro deaktivaci tohoto omezení.',
    'required_guild_id' => 'ID serveru',
    'bypass_maintenance' => 'Povolit přihlášení přes Discord během údržby',
    'bypass_maintenance_help' => 'Pokud je povoleno, přihlášení přes Discord zůstává možné i během aktivního režimu údržby, aniž by bylo vyžadováno oprávnění k přístupu během údržby. Pokud je zakázáno, platí stejná pravidla jako u klasického přihlášení.',

    'users' => [
        'no_password_warning' => 'Pro tento účet není nastaveno žádné heslo. V současné době se lze přihlásit pouze přes Discord. Nastavením hesla níže se také povolí klasické přihlášení heslem.',
        'no_password_error' => 'Pro tento účet není nastaveno žádné heslo. V současné době se vůbec nemůže přihlásit. Nastavením hesla níže se povolí klasické přihlášení heslem.',
    ],

    'force_unlink' => [
        'button' => 'Zrušit propojení (uzamkne účet)',
        'title' => 'Zrušit propojení tohoto účtu Discord bez hesla?',
        'warning' => 'Toto propojení s Discordem je v současnosti jediným způsobem přihlášení k tomuto účtu. Zrušením propojení dojde k uzamčení účtu, dokud mu níže nebude nastaveno heslo – to se neděje automaticky.',
        'confirm' => 'Přesto zrušit propojení',
    ],

    'tools' => [
        'title' => 'Nástroje Discordu',
        'bot_unavailable' => 'Nakonfigurujte token bota v nastavení pluginu, abyste odemkli odesílání DM, hesla pro obnovení nebo záložních kódů 2FA.',

        'dm' => [
            'button' => 'Odeslat DM',
            'title' => 'Odeslat DM Discordu',
            'content_label' => 'Zpráva',
            'confirm' => 'Odeslat',
            'sent' => 'Zpráva byla odeslána.',
            'failed' => 'Zprávu se nepodařilo odeslat - bot a tento uživatel možná nesdílejí žádný server, nebo má uživatel vypnuté DM.',
        ],

        'recovery_password' => [
            'button' => 'Odeslat heslo pro obnovení',
            'title' => 'Odeslat heslo pro obnovení',
            'warning' => 'Vygeneruje se nové náhodné heslo, vynutí se jeho změna při příštím přihlášení a odešle se uživateli přes DM Discordu.',
            'invalidate_sessions' => 'Také odhlásit ze všech aktuálně otevřených relací',
            'invalidate_sessions_help' => 'Obnoví token „zapamatovat si mě" a navíc okamžitě vymaže relace uživatele, pokud web používá databázový ovladač relací. U jiných ovladačů relací mohou již otevřené relace zůstat přihlášené až do vlastního vypršení.',
            'confirm' => 'Odeslat',
            'sent' => 'Heslo pro obnovení bylo vygenerováno a odesláno.',
        ],

        'refresh' => [
            'button' => 'Obnovit informace z Discordu',
            'title' => 'Obnovit informace z Discordu',
            'description' => 'Načte aktuální uživatelské jméno tohoto uživatele na Discordu (a avatar, pokud je povolena synchronizace avatarů) z Discordu, pro případ, že si je tam změnil.',
            'confirm' => 'Obnovit',
            'done' => 'Informace z Discordu byly obnoveny.',
            'failed' => 'Nepodařilo se spojit s Discordem k obnovení informací tohoto účtu.',
        ],

        'recovery_codes' => [
            'button' => 'Odeslat záložní kódy 2FA',
            'title' => 'Odeslat záložní kódy 2FA',
            'warning' => 'Nahradí existující dvoufaktorové záložní kódy uživatele novou sadou a odešle je přes DM Discordu. Staré kódy okamžitě přestanou fungovat.',
            'confirm' => 'Odeslat',
            'sent' => 'Nové záložní kódy byly vygenerovány a odeslány.',
        ],
    ],

    'role_sync' => [
        'title' => 'Synchronizace rolí Discordu',
        'description' => 'Automaticky uděluje roli serveru Discord uživatelům splňujícím podmínky pravidla a odebírá ji, jakmile je přestanou splňovat (kontrolováno v reálném čase při relevantních změnách a podle plánu, aby se zachytily i případy jako vypršelé předplatné).',
        'bot_unavailable' => 'Nakonfigurujte token bota v nastavení výše, abyste odemkli synchronizaci rolí Discordu.',
        'create' => 'Vytvořit pravidlo',
        'edit' => 'Upravit pravidlo',
        'empty' => 'Zatím žádná pravidla synchronizace.',
        'guild_id' => 'ID serveru',
        'role_id' => 'ID role',
        'conditions' => 'Podmínky',
        'condition_site_roles' => 'Role webu: :roles',
        'condition_shop_package' => 'Vlastní produkt: :package',
        'condition_balance' => 'Zůstatek mezi :min a :max',
        'no_conditions' => 'Žádné (platí pro všechny)',
        'conditions_title' => 'Podmínky',
        'conditions_help' => 'Aby toto pravidlo udělilo svou roli, musí být splněny všechny níže nastavené podmínky společně. Ponechte podmínku prázdnou/nevybranou, aby se nekontrolovala. Několik pravidel může cílit na stejnou roli serveru: stačí splnit jedno z nich, aby ji uživatel získal.',
        'condition_site_roles_label' => 'Omezit na určité role webu',
        'condition_site_roles_help' => 'Ponechte všechna políčka nezaškrtnutá, aby se tato podmínka nekontrolovala.',
        'condition_shop_package_label' => 'Vyžaduje vlastnictví tohoto produktu obchodu',
        'no_condition' => 'Tuto podmínku nekontrolovat',
        'balance_min' => 'Minimální zůstatek',
        'balance_max' => 'Maximální zůstatek',
        'discord_role_title' => 'Role Discordu k udělení',
    ],

    'email_warning' => [
        'title' => 'Bezpečnostní upozornění',
        'body' => 'Párování účtů podle e-mailové adresy je méně bezpečné než podle ID Discordu: kdokoli, kdo ovládá ověřenou e-mailovou adresu na Discordu, se bude moci přihlásit k účtu webu s touto adresou, aniž by kdy došlo k propojení. Pokud je e-mailový účet napaden nebo znovu použit, platí totéž pro účet webu. Tuto možnost povolte pouze pokud tomuto riziku rozumíte.',
        'confirm' => 'Rozumím riziku',
    ],

    'info' => [
        'setup' => 'Tento plugin využívá aplikaci Discord nakonfigurovanou ve <a href=":url">Správě rolí &rarr; Propojit role s Discordem</a> (client ID / client secret). Pokud jste tak ještě neučinili, nastavte ji tam nejprve.',
        'redirect_intro' => 'V <b>portálu pro vývojáře Discordu</b>, v části <b>OAuth2</b> &rarr; <b>Obecné</b>, přidejte navíc tyto URL adresy do <b>Přesměrování</b> (kromě té pro propojení profilu):',
    ],

    'test' => [
        'title' => 'Otestovat konfiguraci',
        'description' => 'Zkontrolujte, že client ID/secret jsou platné, a poté spusťte skutečné testovací přihlášení pro potvrzení, že přesměrovací URL adresy jsou skutečně zaregistrovány na Discordu (to je jediný spolehlivý způsob ověření: Discord je validuje pouze na obrazovce autorizace, nikoli dříve).',
        'credentials_button' => 'Zkontrolovat client ID / secret',
        'bot_token_button' => 'Zkontrolovat token bota',
        'bot_token_ok' => 'Token bota je platný.',
        'bot_token_invalid' => 'Token bota chybí nebo je nesprávný.',
        'callback_button_login' => 'Otestovat callback přihlášení',
        'callback_button_confirm' => 'Otestovat potvrzovací callback',
        'callback_help' => 'Tato tlačítka vás skutečně přesměrují na Discord pomocí dvou výše uvedených URL adres. Pokud se na tuto stránku vrátíte se zprávou o úspěchu, potvrzuje to, že testovaná URL adresa je zaregistrována. Pokud Discord zobrazí chybu „neplatná redirect_uri" ještě předtím, než vás požádá o přihlášení, tato URL adresa chybí nebo je nesprávná.',
        'not_configured' => 'Není nakonfigurováno žádné client ID / secret Discordu. Nejprve je nastavte ve správě rolí.',
        'network_error' => 'Nepodařilo se připojit k API Discordu. Zkuste to prosím později.',
        'credentials_invalid' => 'Client ID nebo client secret je nesprávné.',
        'credentials_ok' => 'Client ID a client secret jsou platné.',
        'callback_failed' => 'Test selhal. Zkontrolujte, že testovaná přesměrovací URL adresa je zaregistrována na Discordu a že client secret je správný.',
        'callback_ok' => 'Test úspěšně proveden jako :name — tato přesměrovací URL adresa je správně zaregistrována na Discordu.',
    ],
];
