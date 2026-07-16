<?php

return [
    'permission' => 'Hantera inställningar för Discord-inloggning',
    'allow_duplicates' => 'Tillåt dubbletter av Discord-kopplingar',
    'allow_duplicates_help' => 'Om aktiverat kan samma Discord-konto kopplas till flera webbplatskonton; vid inloggning väljer användaren vilket konto att logga in på. Om inaktiverat nekas koppling om denna Discord redan är kopplad till ett annat konto.',
    'allow_passwordless' => 'Tillåt skapande av konton utan lösenord',
    'allow_passwordless_help' => 'Om aktiverat är lösenordet valfritt vid registrering med Discord (kontot kan då bara logga in via Discord tills ett lösenord anges från profilen). Om inaktiverat krävs ett lösenord för att skapa ett konto med Discord.',
    'http_warning' => 'Denna webbplats laddas via HTTP (osäkert). Discord accepterar endast HTTPS-omdirigerings-URL:er, förutom undantaget localhost/127.0.0.1 för lokal utveckling. Callbacks kommer att misslyckas tills webbplatsen levereras via HTTPS.',
    'custom_credentials' => 'Använd dedikerade Discord-uppgifter',
    'custom_credentials_help' => 'Om aktiverat kommer detta tillägg att använda client ID / secret nedan istället för de som konfigurerats i rollhantering. De omdirigerings-URL:er som anges ovan måste då läggas till i den dedikerade Discord-applikationen.',
    'bot_token' => 'Bot-token',
    'bot_token_help' => 'Token för en Discord-bot som bjudits in till din/dina server(ar) med behörigheterna "Hantera roller" och "Skapa direkt inbjudan". Krävs för Discords adminverktyg, rollsynkronisering och alternativet "Begränsa till servermedlemmar" nedan - annars valfritt.',
    'bot_token_shared_help' => 'Återanvänder för närvarande bot-token som redan konfigurerats på sidan Rollhantering &rarr; Koppla roller till Discord. Aktivera "Använd dedikerade Discord-uppgifter" ovan för att använda en annan bot.',
    'customizable_email' => 'Tillåt anpassningsbar registrerings-e-post',
    'customizable_email_help' => 'Om aktiverat kan användaren välja en annan e-postadress än sin Discord-e-post när registreringen slutförs, istället för att vara låst till Discord-e-posten. Kan inte aktiveras samtidigt som "Matcha konton via e-postadress".',
    'match_by_email' => 'Matcha konton via e-postadress',
    'match_by_email_help' => 'Om aktiverat, när inget konto är kopplat till den Discorden, kommer inloggningen att försöka hitta ett webbplatskonto vars e-postadress matchar den (verifierade) Discord-e-postadressen. Explicita kopplingar har alltid prioritet.',
    'incompatible_with_match_by_email' => 'Denna inställning kan inte aktiveras samtidigt som ":option".',
    'sync_avatar' => 'Synkronisera avatar med Discord',
    'sync_avatar_help' => 'Om aktiverat ställs användarens webbplatsavatar in till dennes Discord-avatar vid varje inloggning/registrering, samt varje gång en admin använder "Uppdatera Discord-info" nedan.',
    'required_guild' => 'Begränsa till servermedlemmar',
    'required_guild_help' => 'Om ett server-ID anges krävs medlemskap i den servern för att logga in eller registrera sig med Discord - användaren läggs automatiskt till (dennes samtycke till behörigheten "guilds.join" begärs av Discord självt, på auktoriseringsskärmen) om denne inte redan är medlem. Kräver en bot-token ovan, inbjuden till den servern med behörigheten "Skapa direkt inbjudan". Lämna server-ID:t tomt för att inaktivera denna begränsning.',
    'required_guild_id' => 'Server-ID',
    'bypass_maintenance' => 'Tillåt Discord-inloggning under underhåll',
    'bypass_maintenance_help' => 'Om aktiverat, förblir inloggning med Discord möjlig även när underhållsläget är aktivt, utan att behörighet för underhållsåtkomst krävs. Om inaktiverat gäller samma regler som för klassisk inloggning.',

    'users' => [
        'no_password_warning' => 'Detta konto har inget lösenord. Det kan för närvarande bara logga in via Discord. Att ange ett lösenord nedan aktiverar även klassisk lösenordsinloggning.',
        'no_password_error' => 'Detta konto har inget lösenord. Det kan för närvarande inte logga in alls. Att ange ett lösenord nedan aktiverar klassisk lösenordsinloggning.',
    ],

    'force_unlink' => [
        'button' => 'Koppla bort (låser kontot)',
        'title' => 'Koppla bort detta lösenordslösa Discord-konto?',
        'warning' => 'Denna Discord-koppling är för närvarande det enda sättet för detta konto att logga in. Att koppla bort den låser kontot tills det ges ett lösenord nedan - det görs inte automatiskt.',
        'confirm' => 'Koppla bort ändå',
    ],

    'tools' => [
        'title' => 'Discord-verktyg',
        'bot_unavailable' => 'Konfigurera en bot-token i tilläggets inställningar för att låsa upp att skicka ett DM, ett återställningslösenord, eller 2FA-återställningskoder.',

        'dm' => [
            'button' => 'Skicka ett DM',
            'title' => 'Skicka ett Discord-DM',
            'content_label' => 'Meddelande',
            'confirm' => 'Skicka',
            'sent' => 'Meddelandet skickades.',
            'failed' => 'Kunde inte skicka meddelandet - boten och denna användare delar kanske inte en server, eller så har användaren stängt av DM.',
        ],

        'recovery_password' => [
            'button' => 'Skicka ett återställningslösenord',
            'title' => 'Skicka ett återställningslösenord',
            'warning' => 'Detta genererar ett nytt slumpmässigt lösenord, tvingar fram en ändring vid nästa inloggning, och skickar det till användaren via Discord-DM.',
            'invalidate_sessions' => 'Logga även ut från alla för närvarande öppna sessioner',
            'invalidate_sessions_help' => 'Förnyar "kom ihåg mig"-token, och rensar dessutom omedelbart användarens sessioner om webbplatsen använder databas-sessionsdrivrutinen. Med andra sessionsdrivrutiner kan redan öppna sessioner förbli inloggade tills de själva upphör att gälla.',
            'confirm' => 'Skicka',
            'sent' => 'Återställningslösenordet genererades och skickades.',
        ],

        'refresh' => [
            'button' => 'Uppdatera Discord-info',
            'title' => 'Uppdatera Discord-info',
            'description' => 'Hämtar denna användares aktuella Discord-användarnamn (och avatar, om avatarsynkronisering är aktiverat) från Discord, ifall denne ändrat det där.',
            'confirm' => 'Uppdatera',
            'done' => 'Discord-infon uppdaterades.',
            'failed' => 'Kunde inte nå Discord för att uppdatera detta kontos info.',
        ],

        'recovery_codes' => [
            'button' => 'Skicka 2FA-återställningskoder',
            'title' => 'Skicka 2FA-återställningskoder',
            'warning' => 'Detta ersätter användarens befintliga tvåfaktors-återställningskoder med en ny uppsättning, och skickar dem via Discord-DM. De gamla koderna slutar fungera omedelbart.',
            'confirm' => 'Skicka',
            'sent' => 'Nya återställningskoder genererades och skickades.',
        ],
    ],

    'role_sync' => [
        'title' => 'Discord-rollsynkronisering',
        'description' => 'Ger automatiskt en Discord-serverroll till användare som matchar en regels villkor, och tar bort den så snart de inte längre gör det (kontrolleras i realtid vid relevanta ändringar, samt enligt ett schema för att också fånga upp saker som en utgången prenumeration).',
        'bot_unavailable' => 'Konfigurera en bot-token i inställningarna ovan för att låsa upp Discord-rollsynkronisering.',
        'create' => 'Skapa en regel',
        'edit' => 'Redigera regeln',
        'empty' => 'Inga synkroniseringsregler ännu.',
        'guild_id' => 'Server-ID',
        'role_id' => 'Roll-ID',
        'conditions' => 'Villkor',
        'condition_site_roles' => 'Webbplatsroll: :roles',
        'condition_shop_package' => 'Äger paketet: :package',
        'condition_balance' => 'Saldo mellan :min och :max',
        'no_conditions' => 'Inget (gäller alla)',
        'conditions_title' => 'Villkor',
        'conditions_help' => 'Alla villkor som anges nedan måste uppfyllas tillsammans för att denna regel ska ge sin roll. Lämna ett villkor tomt/oval för att inte kontrollera det. Flera regler kan rikta in sig på samma serverroll: det räcker att matcha en av dem för att få den.',
        'condition_site_roles_label' => 'Begränsa till vissa webbplatsroller',
        'condition_site_roles_help' => 'Lämna alla kryssrutor avmarkerade för att inte kontrollera detta villkor.',
        'condition_shop_package_label' => 'Kräver ägande av detta shop-paket',
        'no_condition' => 'Kontrollera inte detta villkor',
        'balance_min' => 'Minsta saldo',
        'balance_max' => 'Högsta saldo',
        'discord_role_title' => 'Discord-roll att tilldela',
    ],

    'email_warning' => [
        'title' => 'Säkerhetsvarning',
        'body' => 'Att matcha konton via e-postadress är mindre säkert än via Discord-ID: vem som helst som kontrollerar en verifierad e-postadress på Discord kommer att kunna logga in på webbplatskontot med den adressen, utan att någon koppling någonsin gjorts. Om ett e-postkonto komprometteras eller återanvänds gäller detsamma för webbplatskontot. Aktivera detta alternativ endast om du förstår denna risk.',
        'confirm' => 'Jag förstår risken',
    ],

    'info' => [
        'setup' => 'Detta tillägg återanvänder Discord-applikationen som konfigurerats i <a href=":url">Rollhantering &rarr; Koppla roller till Discord</a> (client ID / client secret). Konfigurera den där först om du inte redan har gjort det.',
        'redirect_intro' => 'I <b>Discords utvecklarportal</b>, under <b>OAuth2</b> &rarr; <b>General</b>, lägg dessutom till dessa URL:er i <b>Redirects</b> (utöver den för profilkoppling):',
    ],

    'test' => [
        'title' => 'Testa konfigurationen',
        'description' => 'Kontrollera att client ID/secret är giltiga och kör sedan en riktig testinloggning för att bekräfta att omdirigerings-URL:erna faktiskt är registrerade hos Discord (det är det enda tillförlitliga sättet att kontrollera: Discord validerar dem först på auktoriseringsskärmen, inte innan).',
        'credentials_button' => 'Kontrollera client ID / secret',
        'bot_token_button' => 'Kontrollera bot-token',
        'bot_token_ok' => 'Bot-token är giltig.',
        'bot_token_invalid' => 'Bot-token saknas eller är felaktig.',
        'callback_button_login' => 'Testa inloggnings-callbacken',
        'callback_button_confirm' => 'Testa bekräftelse-callbacken',
        'callback_help' => 'Dessa knappar omdirigerar dig faktiskt till Discord, med hjälp av de två URL:erna som anges ovan. Om du kommer tillbaka till denna sida med ett framgångsmeddelande bekräftar det att den testade URL:en är registrerad. Om Discord visar ett "invalid redirect_uri"-fel innan du ens ombeds logga in, saknas eller är den URL:en felaktig.',
        'not_configured' => 'Inget Discord client ID / secret är konfigurerat. Ställ in dem i rollhanteringen först.',
        'network_error' => 'Kunde inte nå Discords API. Försök igen senare.',
        'credentials_invalid' => 'Client ID eller client secret är felaktigt.',
        'credentials_ok' => 'Client ID och client secret är giltiga.',
        'callback_failed' => 'Testet misslyckades. Kontrollera att den testade omdirigerings-URL:en är registrerad hos Discord och att client secret är korrekt.',
        'callback_ok' => 'Testet lyckades som :name — den omdirigerings-URL:en är korrekt registrerad hos Discord.',
    ],
];
