<?php

return [
    'permission' => "Gestiona la configuració d'inici de sessió amb Discord",
    'allow_duplicates' => 'Permet vincles duplicats de Discord',
    'allow_duplicates_help' => "Si està activat, el mateix compte de Discord es pot vincular a diversos comptes del lloc; en iniciar sessió, l'usuari triarà a quin compte vol accedir. Si està desactivat, es rebutja la vinculació si aquest Discord ja està vinculat a un altre compte.",
    'allow_passwordless' => 'Permet la creació de comptes sense contrasenya',
    'allow_passwordless_help' => "Si està activat, la contrasenya és opcional en registrar-se amb Discord (el compte només podrà iniciar sessió via Discord fins que es defineixi una contrasenya des del perfil). Si està desactivat, cal una contrasenya per crear un compte amb Discord.",
    'http_warning' => 'Aquest lloc es carrega per HTTP (no segur). Discord només accepta URL de redirecció HTTPS, excepte per a localhost/127.0.0.1 per al desenvolupament local. Els callbacks fallaran fins que el lloc es serveixi per HTTPS.',
    'custom_credentials' => 'Utilitza credencials de Discord dedicades',
    'custom_credentials_help' => "Si està activat, aquest connector utilitzarà el client ID / secret següents en lloc dels configurats a la gestió de rols. Les URL de redirecció indicades a dalt s'hauran d'afegir a aquesta aplicació de Discord dedicada.",
    'bot_token' => 'Token del bot',
    'bot_token_help' => 'El token d\'un bot de Discord convidat al teu(s) servidor(s) amb els permisos «Gestiona els rols» i «Crea una invitació instantània». Necessari per a les eines de Discord de l\'administració, la sincronització de rols i l\'opció «Limita als membres d\'un servidor» de sota — opcional en cas contrari.',
    'bot_token_shared_help' => 'Actualment es reutilitza el token del bot ja configurat a la pàgina Gestió de rols &rarr; Vincula rols amb Discord. Activa «Utilitza credencials de Discord dedicades» a dalt per utilitzar un altre bot.',
    'customizable_email' => "Permet un correu d'inscripció personalitzable",
    'customizable_email_help' => "Si està activat, l'usuari pot triar una adreça de correu diferent de la del seu compte Discord en completar el registre, en lloc d'estar limitat al correu de Discord. No es pot activar juntament amb «Fes coincidir els comptes per adreça de correu».",
    'match_by_email' => "Fes coincidir els comptes per adreça de correu",
    'match_by_email_help' => "Si està activat, quan cap compte estigui vinculat a aquest Discord, l'inici de sessió intentarà trobar un compte del lloc l'adreça de correu del qual coincideixi amb el correu (verificat) de Discord. Els vincles explícits sempre tenen prioritat.",
    'incompatible_with_match_by_email' => "Aquesta opció no es pot activar alhora amb «:option».",
    'sync_avatar' => "Sincronitza l'avatar amb Discord",
    'sync_avatar_help' => "Si està activat, l'avatar del lloc de l'usuari s'estableix segons el seu avatar de Discord a cada inici de sessió/registre, i cada vegada que un administrador utilitza «Actualitza la informació de Discord» a sota.",
    'required_guild' => "Limita als membres d'un servidor",
    'required_guild_help' => "Si s'estableix un ID de servidor, iniciar sessió o registrar-se amb Discord requereix ser membre d'aquest servidor — l'usuari hi és afegit automàticament (Discord mateix demana el seu consentiment per al permís «guilds.join» a la pantalla d'autorització) si encara no n'és membre. Requereix un token de bot a dalt, convidat a aquest servidor amb el permís «Crea una invitació instantània». Deixa l'ID de servidor buit per desactivar aquesta restricció.",
    'required_guild_id' => 'ID del servidor',
    'bypass_maintenance' => 'Permet iniciar sessió amb Discord durant el manteniment',
    'bypass_maintenance_help' => "Si està activat, l'inici de sessió amb Discord continua sent possible fins i tot quan el mode de manteniment està actiu, sense requerir el permís d'accés al manteniment. Si està desactivat, segueix les mateixes regles que l'inici de sessió clàssic.",

    'users' => [
        'no_password_warning' => "Aquest compte no té cap contrasenya definida. Actualment només pot iniciar sessió amb Discord. Si defineixes una contrasenya a continuació, també s'activarà l'inici de sessió clàssic amb contrasenya.",
        'no_password_error' => "Aquest compte no té cap contrasenya definida. Actualment no pot iniciar sessió de cap manera. Si defineixes una contrasenya a continuació, s'activarà l'inici de sessió clàssic amb contrasenya.",
    ],

    'force_unlink' => [
        'button' => 'Desvincula (bloqueja el compte)',
        'title' => 'Vols desvincular aquest compte de Discord sense contrasenya?',
        'warning' => "Aquest vincle de Discord és actualment l'única manera d'iniciar sessió d'aquest compte. Desvincular-lo bloquejarà el compte fins que se li defineixi una contrasenya a continuació — això no es fa automàticament.",
        'confirm' => 'Desvincula igualment',
    ],

    'tools' => [
        'title' => 'Eines de Discord',
        'bot_unavailable' => "Configura un token de bot a la configuració del connector per desbloquejar l'enviament d'un MP, d'una contrasenya de recuperació, o de codis de recuperació 2FA.",

        'dm' => [
            'button' => 'Envia un MP',
            'title' => 'Envia un MP de Discord',
            'content_label' => 'Missatge',
            'confirm' => 'Envia',
            'sent' => "S'ha enviat el missatge.",
            'failed' => "No s'ha pogut enviar el missatge — potser el bot i aquest usuari no comparteixen cap servidor, o l'usuari té els MP desactivats.",
        ],

        'recovery_password' => [
            'button' => 'Envia una contrasenya de recuperació',
            'title' => 'Envia una contrasenya de recuperació',
            'warning' => 'Genera una nova contrasenya aleatòria, en força el canvi al següent inici de sessió, i l\'envia a l\'usuari per MP de Discord.',
            'invalidate_sessions' => 'Tanca també totes les sessions actualment obertes',
            'invalidate_sessions_help' => "Renova el testimoni «recorda'm», i a més buida immediatament les sessions de l'usuari si el lloc utilitza el controlador de sessions de base de dades. Amb altres controladors de sessió, les sessions ja obertes poden romandre connectades fins que caduquin per si soles.",
            'confirm' => 'Envia',
            'sent' => "La contrasenya de recuperació s'ha generat i enviat.",
        ],

        'refresh' => [
            'button' => 'Actualitza la informació de Discord',
            'title' => 'Actualitza la informació de Discord',
            'description' => "Obté el nom d'usuari actual de Discord d'aquest usuari (i el seu avatar, si la sincronització d'avatar està activada) des de Discord, per si l'ha canviat allà.",
            'confirm' => 'Actualitza',
            'done' => "La informació de Discord s'ha actualitzat.",
            'failed' => 'No s\'ha pogut contactar amb Discord per actualitzar la informació d\'aquest compte.',
        ],

        'recovery_codes' => [
            'button' => 'Envia els codis de recuperació 2FA',
            'title' => 'Envia els codis de recuperació 2FA',
            'warning' => "Substitueix els codis de recuperació de doble factor existents de l'usuari per un nou conjunt, i els envia per MP de Discord. Els codis antics deixen de funcionar immediatament.",
            'confirm' => 'Envia',
            'sent' => "S'han generat i enviat nous codis de recuperació.",
        ],
    ],

    'role_sync' => [
        'title' => 'Sincronització de rols de Discord',
        'description' => "Atorga automàticament un rol de servidor de Discord als usuaris que compleixen les condicions d'una regla, i el retira quan deixen de complir-les (comprovat en temps real en canvis rellevants, i en una planificació per capturar també casos com una subscripció caducada).",
        'bot_unavailable' => 'Configura un token de bot a la configuració de dalt per desbloquejar la sincronització de rols de Discord.',
        'create' => 'Crea una regla',
        'edit' => 'Edita la regla',
        'empty' => 'Encara no hi ha regles de sincronització.',
        'guild_id' => 'ID del servidor',
        'role_id' => 'ID del rol',
        'conditions' => 'Condicions',
        'condition_site_roles' => 'Rol del lloc: :roles',
        'condition_shop_package' => 'Posseeix l\'article: :package',
        'condition_balance' => 'Saldo entre :min i :max',
        'no_conditions' => "Cap (s'aplica a tothom)",
        'conditions_title' => 'Condicions',
        'conditions_help' => "Totes les condicions establertes a continuació s'han de complir juntes perquè aquesta regla atorgui el seu rol. Deixa una condició buida/no seleccionada per no comprovar-la. Diverses regles poden apuntar al mateix rol de servidor: n'hi ha prou de complir-ne una per obtenir-lo.",
        'condition_site_roles_label' => 'Limita a certs rols del lloc',
        'condition_site_roles_help' => 'Deixa totes les caselles sense marcar per no comprovar aquesta condició.',
        'condition_shop_package_label' => "Requereix posseir aquest article de la botiga",
        'no_condition' => 'No comprovis aquesta condició',
        'balance_min' => 'Saldo mínim',
        'balance_max' => 'Saldo màxim',
        'discord_role_title' => 'Rol de Discord a atorgar',
    ],

    'email_warning' => [
        'title' => 'Avís de seguretat',
        'body' => "Fer coincidir els comptes per adreça de correu és menys segur que per ID de Discord: qualsevol que controli una adreça de correu verificada a Discord podrà iniciar sessió al compte del lloc amb aquesta adreça, sense que mai s'hagi fet cap vinculació. Si un compte de correu es veu compromès o es reutilitza, també ho és el compte del lloc. Activa aquesta opció només si entens aquest risc.",
        'confirm' => 'Entenc el risc',
    ],

    'info' => [
        'setup' => 'Aquest connector reutilitza l\'aplicació de Discord configurada a <a href=":url">Gestió de rols &rarr; Vincula rols amb Discord</a> (client ID / client secret). Configura-la allà primer si encara no ho has fet.',
        'redirect_intro' => 'Al <b>portal de desenvolupadors de Discord</b>, a <b>OAuth2</b> &rarr; <b>General</b>, afegeix addicionalment aquestes URL als <b>Redirects</b> (a més de la del vincle de perfil):',
    ],

    'test' => [
        'title' => 'Prova la configuració',
        'description' => "Comprova que el client ID/secret siguin vàlids, i després executa un inici de sessió de prova real per confirmar que les URL de redirecció estan realment registrades a Discord (és l'única manera fiable de comprovar-ho: Discord només les valida a la pantalla d'autorització, no abans).",
        'credentials_button' => 'Comprova el client ID / secret',
        'bot_token_button' => 'Comprova el token del bot',
        'bot_token_ok' => 'El token del bot és vàlid.',
        'bot_token_invalid' => 'El token del bot falta o és incorrecte.',
        'callback_button_login' => "Prova el callback d'inici de sessió",
        'callback_button_confirm' => 'Prova el callback de confirmació',
        'callback_help' => 'Aquests botons et redirigeixen realment a Discord, utilitzant les dues URL indicades a dalt. Si tornes a aquesta pàgina amb un missatge d\'èxit, això confirma que la URL provada està registrada. Si Discord mostra un error "redirect_uri invàlida" fins i tot abans de demanar-te iniciar sessió, aquesta URL falta o és incorrecta.',
        'not_configured' => "No hi ha cap client ID / secret de Discord configurat. Configura'ls primer a la gestió de rols.",
        'network_error' => "No s'ha pogut connectar amb l'API de Discord. Torna-ho a provar més tard.",
        'credentials_invalid' => 'El client ID o el client secret és incorrecte.',
        'credentials_ok' => 'El client ID i el client secret són vàlids.',
        'callback_failed' => 'La prova ha fallat. Comprova que la URL de redirecció provada estigui registrada a Discord i que el client secret sigui correcte.',
        'callback_ok' => 'Prova superada com a :name — aquesta URL de redirecció està correctament registrada a Discord.',
    ],
];
