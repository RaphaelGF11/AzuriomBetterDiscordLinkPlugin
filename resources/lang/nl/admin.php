<?php

return [
    'permission' => 'Discord-loginsinstellingen beheren',
    'allow_duplicates' => 'Dubbele Discord-koppelingen toestaan',
    'allow_duplicates_help' => 'Indien ingeschakeld, kan hetzelfde Discord-account aan meerdere site-accounts worden gekoppeld; bij het inloggen kiest de gebruiker bij welk account hij wil inloggen. Indien uitgeschakeld, wordt koppelen geweigerd als deze Discord al aan een ander account is gekoppeld.',
    'allow_passwordless' => 'Aanmaken van accounts zonder wachtwoord toestaan',
    'allow_passwordless_help' => 'Indien ingeschakeld, is het wachtwoord optioneel bij registratie met Discord (het account kan dan alleen via Discord inloggen, totdat er een wachtwoord is ingesteld vanuit het profiel). Indien uitgeschakeld, is een wachtwoord vereist om een account met Discord aan te maken.',
    'http_warning' => 'Deze site wordt geladen via HTTP (niet veilig). Discord accepteert alleen HTTPS-redirect-URL\'s, behalve voor de localhost/127.0.0.1-uitzondering voor lokale ontwikkeling. Callbacks zullen mislukken totdat de site via HTTPS wordt aangeboden.',
    'custom_credentials' => 'Gebruik speciale Discord-inloggegevens',
    'custom_credentials_help' => 'Indien ingeschakeld, gebruikt deze plugin de onderstaande client ID / secret in plaats van die geconfigureerd in rolbeheer. De hierboven vermelde redirect-URL\'s moeten dan worden toegevoegd aan die speciale Discord-applicatie.',
    'bot_token' => 'Bot-token',
    'bot_token_help' => 'Het token van een Discord-bot die is uitgenodigd op je server(s) met de rechten "Rollen beheren" en "Direct uitnodiging aanmaken". Nodig voor de Discord-beheertools, rolsynchronisatie en de optie "Beperken tot serverleden" hieronder - anders optioneel.',
    'bot_token_shared_help' => 'Momenteel wordt het bot-token hergebruikt dat al is geconfigureerd op de pagina Rolbeheer &rarr; Rollen koppelen met Discord. Schakel hierboven "Gebruik speciale Discord-inloggegevens" in om een andere bot te gebruiken.',
    'customizable_email' => 'Aanpasbaar registratie-e-mailadres toestaan',
    'customizable_email_help' => 'Indien ingeschakeld, kan de gebruiker bij het voltooien van de registratie een ander e-mailadres kiezen dan dat van zijn Discord-account, in plaats van vastgezet te zijn op het Discord-e-mailadres. Kan niet tegelijk worden ingeschakeld met "Accounts koppelen op basis van e-mailadres".',
    'match_by_email' => 'Accounts koppelen op basis van e-mailadres',
    'match_by_email_help' => 'Indien ingeschakeld, zal het inloggen, wanneer geen account is gekoppeld aan die Discord, proberen een site-account te vinden waarvan het e-mailadres overeenkomt met het (geverifieerde) Discord-e-mailadres. Expliciete koppelingen hebben altijd voorrang.',
    'incompatible_with_match_by_email' => 'Deze instelling kan niet tegelijk worden ingeschakeld met ":option".',
    'sync_avatar' => 'Avatar synchroniseren met Discord',
    'sync_avatar_help' => 'Indien ingeschakeld, wordt de site-avatar van de gebruiker bij elke login/registratie ingesteld op zijn Discord-avatar, en telkens wanneer een beheerder hieronder "Discord-info vernieuwen" gebruikt.',
    'required_guild' => 'Beperken tot serverleden',
    'required_guild_help' => 'Als een server-ID is ingesteld, vereist inloggen of registreren met Discord lidmaatschap van die server - de gebruiker wordt er automatisch aan toegevoegd (zijn toestemming voor de "guilds.join"-rechten wordt door Discord zelf gevraagd, op het autorisatiescherm) als hij nog geen lid is. Vereist een bot-token hierboven, uitgenodigd op die server met de rechten "Direct uitnodiging aanmaken". Laat het server-ID leeg om deze beperking uit te schakelen.',
    'required_guild_id' => 'Server-ID',
    'bypass_maintenance' => 'Discord-login toestaan tijdens onderhoud',
    'bypass_maintenance_help' => 'Indien ingeschakeld, blijft inloggen met Discord mogelijk, zelfs terwijl de onderhoudsmodus actief is, zonder dat de onderhoudstoegangsmachtiging vereist is. Indien uitgeschakeld, gelden dezelfde regels als bij klassiek inloggen.',

    'users' => [
        'no_password_warning' => 'Voor dit account is geen wachtwoord ingesteld. Het kan momenteel alleen via Discord inloggen. Als je hieronder een wachtwoord instelt, wordt ook klassiek inloggen met wachtwoord ingeschakeld.',
        'no_password_error' => 'Voor dit account is geen wachtwoord ingesteld. Het kan momenteel helemaal niet inloggen. Als je hieronder een wachtwoord instelt, wordt klassiek inloggen met wachtwoord ingeschakeld.',
    ],

    'force_unlink' => [
        'button' => 'Ontkoppelen (vergrendelt het account)',
        'title' => 'Dit wachtwoordloze Discord-account ontkoppelen?',
        'warning' => 'Deze Discord-koppeling is momenteel de enige manier waarop dit account kan inloggen. Ontkoppelen vergrendelt het account totdat er hieronder een wachtwoord voor wordt ingesteld - dat gebeurt niet automatisch.',
        'confirm' => 'Toch ontkoppelen',
    ],

    'tools' => [
        'title' => 'Discord-tools',
        'bot_unavailable' => 'Configureer een bot-token in de plugin-instellingen om het versturen van een DM, een herstelwachtwoord, of 2FA-herstelcodes te ontgrendelen.',

        'dm' => [
            'button' => 'DM versturen',
            'title' => 'Discord-DM versturen',
            'content_label' => 'Bericht',
            'confirm' => 'Versturen',
            'sent' => 'Het bericht is verstuurd.',
            'failed' => 'Kon het bericht niet versturen - de bot en deze gebruiker delen mogelijk geen server, of de gebruiker heeft DM\'s uitgeschakeld.',
        ],

        'recovery_password' => [
            'button' => 'Herstelwachtwoord versturen',
            'title' => 'Herstelwachtwoord versturen',
            'warning' => 'Dit genereert een nieuw willekeurig wachtwoord, forceert de wijziging ervan bij de volgende login, en verstuurt het naar de gebruiker via Discord-DM.',
            'invalidate_sessions' => 'Ook alle momenteel geopende sessies afmelden',
            'invalidate_sessions_help' => 'Vernieuwt het "onthoud mij"-token, en wist bovendien direct de sessies van de gebruiker als de site het database-sessiedriver gebruikt. Bij andere sessiedrivers kunnen al geopende sessies ingelogd blijven totdat ze zelf verlopen.',
            'confirm' => 'Versturen',
            'sent' => 'Het herstelwachtwoord is gegenereerd en verstuurd.',
        ],

        'refresh' => [
            'button' => 'Discord-info vernieuwen',
            'title' => 'Discord-info vernieuwen',
            'description' => 'Haalt de huidige Discord-gebruikersnaam van deze gebruiker op (en avatar, indien avatar-synchronisatie is ingeschakeld) bij Discord, voor het geval hij deze daar heeft gewijzigd.',
            'confirm' => 'Vernieuwen',
            'done' => 'De Discord-info is vernieuwd.',
            'failed' => 'Kon Discord niet bereiken om de info van dit account te vernieuwen.',
        ],

        'recovery_codes' => [
            'button' => '2FA-herstelcodes versturen',
            'title' => '2FA-herstelcodes versturen',
            'warning' => 'Dit vervangt de bestaande tweefactor-herstelcodes van de gebruiker door een nieuwe reeks, en verstuurt ze via Discord-DM. De oude codes werken meteen niet meer.',
            'confirm' => 'Versturen',
            'sent' => 'Nieuwe herstelcodes zijn gegenereerd en verstuurd.',
        ],
    ],

    'role_sync' => [
        'title' => 'Discord-rolsynchronisatie',
        'description' => 'Kent automatisch een Discord-serverrol toe aan gebruikers die aan de voorwaarden van een regel voldoen, en trekt deze in zodra ze er niet meer aan voldoen (real-time gecontroleerd bij relevante wijzigingen, en volgens een schema om ook zaken als een verlopen abonnement op te vangen).',
        'bot_unavailable' => 'Configureer een bot-token in de instellingen hierboven om Discord-rolsynchronisatie te ontgrendelen.',
        'create' => 'Regel aanmaken',
        'edit' => 'Regel bewerken',
        'empty' => 'Nog geen synchronisatieregels.',
        'guild_id' => 'Server-ID',
        'role_id' => 'Rol-ID',
        'conditions' => 'Voorwaarden',
        'condition_site_roles' => 'Siterol: :roles',
        'condition_shop_package' => 'Bezit artikel: :package',
        'condition_balance' => 'Saldo tussen :min en :max',
        'no_conditions' => 'Geen (geldt voor iedereen)',
        'conditions_title' => 'Voorwaarden',
        'conditions_help' => 'Alle onderstaande ingestelde voorwaarden moeten samen worden vervuld om deze regel zijn rol toe te laten kennen. Laat een voorwaarde leeg/niet-geselecteerd om deze niet te controleren. Meerdere regels kunnen dezelfde serverrol als doel hebben: aan één ervan voldoen is voldoende om deze te krijgen.',
        'condition_site_roles_label' => 'Beperken tot bepaalde siterollen',
        'condition_site_roles_help' => 'Laat alle vakjes uitgevinkt om deze voorwaarde niet te controleren.',
        'condition_shop_package_label' => 'Vereist bezit van dit shop-artikel',
        'no_condition' => 'Deze voorwaarde niet controleren',
        'balance_min' => 'Minimaal saldo',
        'balance_max' => 'Maximaal saldo',
        'discord_role_title' => 'Toe te kennen Discord-rol',
    ],

    'email_warning' => [
        'title' => 'Beveiligingswaarschuwing',
        'body' => 'Accounts koppelen op basis van e-mailadres is minder veilig dan op basis van Discord-ID: iedereen die een geverifieerd e-mailadres op Discord beheert, kan inloggen op het site-account met dat adres, zonder dat er ooit een koppeling is gemaakt. Als een e-mailaccount wordt gecompromitteerd of hergebruikt, geldt dit ook voor het site-account. Schakel deze optie alleen in als je dit risico begrijpt.',
        'confirm' => 'Ik begrijp het risico',
    ],

    'info' => [
        'setup' => 'Deze plugin hergebruikt de Discord-applicatie die is geconfigureerd in <a href=":url">Rolbeheer &rarr; Rollen koppelen met Discord</a> (client ID / client secret). Stel deze daar eerst in als je dat nog niet hebt gedaan.',
        'redirect_intro' => 'Voeg in het <b>Discord-ontwikkelaarsportaal</b>, onder <b>OAuth2</b> &rarr; <b>General</b>, deze URL\'s ook toe aan de <b>Redirects</b> (naast die voor de profielkoppeling):',
    ],

    'test' => [
        'title' => 'Configuratie testen',
        'description' => 'Controleer of de client ID/secret geldig zijn en voer vervolgens een echte testlogin uit om te bevestigen dat de redirect-URL\'s daadwerkelijk zijn geregistreerd bij Discord (dit is de enige betrouwbare manier om dit te controleren: Discord valideert ze pas op het autorisatiescherm, niet ervoor).',
        'credentials_button' => 'Client ID / secret controleren',
        'bot_token_button' => 'Bot-token controleren',
        'bot_token_ok' => 'Het bot-token is geldig.',
        'bot_token_invalid' => 'Het bot-token ontbreekt of is onjuist.',
        'callback_button_login' => 'Login-callback testen',
        'callback_button_confirm' => 'Bevestigings-callback testen',
        'callback_help' => 'Deze knoppen leiden je daadwerkelijk door naar Discord, met gebruik van de twee hierboven vermelde URL\'s. Als je met een succesbericht terugkeert naar deze pagina, bevestigt dat dat de geteste URL is geregistreerd. Als Discord een "invalid redirect_uri"-fout toont nog voordat je wordt gevraagd in te loggen, ontbreekt die URL of is deze onjuist.',
        'not_configured' => 'Er is geen Discord client ID / secret geconfigureerd. Stel deze eerst in bij rolbeheer.',
        'network_error' => 'Kon de Discord-API niet bereiken. Probeer het later opnieuw.',
        'credentials_invalid' => 'De client ID of client secret is onjuist.',
        'credentials_ok' => 'De client ID en client secret zijn geldig.',
        'callback_failed' => 'De test is mislukt. Controleer of de geteste redirect-URL is geregistreerd bij Discord en of de client secret correct is.',
        'callback_ok' => 'Test geslaagd als :name — die redirect-URL is correct geregistreerd bij Discord.',
    ],
];
