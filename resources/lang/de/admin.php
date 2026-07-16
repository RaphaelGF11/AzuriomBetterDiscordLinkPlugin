<?php

return [
    'permission' => 'Discord-Anmeldungseinstellungen verwalten',
    'allow_duplicates' => 'Doppelte Discord-Verknüpfungen erlauben',
    'allow_duplicates_help' => 'Wenn aktiviert, kann dasselbe Discord-Konto mit mehreren Website-Konten verknüpft werden; bei der Anmeldung wählt der Benutzer, mit welchem Konto er sich anmelden möchte. Wenn deaktiviert, wird die Verknüpfung abgelehnt, falls dieses Discord-Konto bereits mit einem anderen Konto verknüpft ist.',
    'allow_passwordless' => 'Erstellung von Konten ohne Passwort erlauben',
    'allow_passwordless_help' => 'Wenn aktiviert, ist das Passwort bei der Registrierung mit Discord optional (das Konto kann sich dann nur über Discord anmelden, bis ein Passwort im Profil festgelegt wird). Wenn deaktiviert, ist ein Passwort erforderlich, um ein Konto mit Discord zu erstellen.',
    'http_warning' => 'Diese Website wird über HTTP geladen (nicht sicher). Discord akzeptiert nur HTTPS-Weiterleitungs-URLs, mit Ausnahme von localhost/127.0.0.1 für die lokale Entwicklung. Callbacks schlagen fehl, bis die Website über HTTPS bereitgestellt wird.',
    'custom_credentials' => 'Eigene Discord-Zugangsdaten verwenden',
    'custom_credentials_help' => 'Wenn aktiviert, verwendet dieses Plugin die untenstehende Client-ID / das Client-Secret anstelle der in der Rollenverwaltung konfigurierten. Die oben aufgeführten Weiterleitungs-URLs müssen dann zu dieser dedizierten Discord-Anwendung hinzugefügt werden.',
    'bot_token' => 'Bot-Token',
    'bot_token_help' => 'Der Token eines Discord-Bots, der auf deinen Server(n) mit den Berechtigungen „Rollen verwalten" und „Sofort-Einladung erstellen" eingeladen wurde. Erforderlich für die Discord-Admin-Tools, die Rollensynchronisierung und die Option „Auf Servermitglieder beschränken" unten - ansonsten optional.',
    'bot_token_shared_help' => 'Verwendet derzeit den Bot-Token, der bereits auf der Seite Rollenverwaltung &rarr; Rollen mit Discord verknüpfen konfiguriert ist. Aktiviere oben „Eigene Discord-Zugangsdaten verwenden", um stattdessen einen anderen Bot zu verwenden.',
    'customizable_email' => 'Anpassbare Registrierungs-E-Mail erlauben',
    'customizable_email_help' => 'Wenn aktiviert, kann der Nutzer beim Abschluss der Registrierung eine andere E-Mail-Adresse als seine Discord-E-Mail wählen, anstatt auf die Discord-E-Mail festgelegt zu sein. Kann nicht gleichzeitig mit „Konten anhand der E-Mail-Adresse zuordnen“ aktiviert werden.',
    'match_by_email' => 'Konten anhand der E-Mail-Adresse zuordnen',
    'match_by_email_help' => 'Wenn aktiviert, versucht die Anmeldung, falls kein Konto mit diesem Discord-Konto verknüpft ist, ein Website-Konto zu finden, dessen E-Mail-Adresse mit der (verifizierten) Discord-E-Mail übereinstimmt. Explizite Verknüpfungen haben immer Vorrang.',
    'incompatible_with_match_by_email' => 'Diese Einstellung kann nicht gleichzeitig mit „:option“ aktiviert werden.',
    'sync_avatar' => 'Avatar mit Discord synchronisieren',
    'sync_avatar_help' => 'Wenn aktiviert, wird der Website-Avatar des Nutzers bei jeder Anmeldung/Registrierung sowie bei jeder Nutzung von „Discord-Infos aktualisieren" durch einen Admin unten auf seinen Discord-Avatar gesetzt.',
    'required_guild' => 'Auf Servermitglieder beschränken',
    'required_guild_help' => 'Wenn eine Server-ID festgelegt ist, erfordert die Anmeldung oder Registrierung mit Discord die Mitgliedschaft in diesem Server - der Nutzer wird automatisch hinzugefügt (seine Zustimmung zur Berechtigung „guilds.join" wird von Discord selbst auf dem Autorisierungsbildschirm eingeholt), falls er noch kein Mitglied ist. Erfordert einen Bot-Token oben, der auf diesen Server mit der Berechtigung „Sofort-Einladung erstellen" eingeladen wurde. Lasse die Server-ID leer, um diese Einschränkung zu deaktivieren.',
    'required_guild_id' => 'Server-ID',
    'bypass_maintenance' => 'Discord-Anmeldung während der Wartung erlauben',
    'bypass_maintenance_help' => 'Wenn aktiviert, bleibt die Anmeldung über Discord auch während des aktiven Wartungsmodus möglich, ohne dass die Berechtigung für den Wartungszugriff erforderlich ist. Wenn deaktiviert, gelten dieselben Regeln wie bei der klassischen Anmeldung.',

    'users' => [
        'no_password_warning' => 'Für dieses Konto ist kein Passwort festgelegt. Es kann derzeit nur über Discord angemeldet werden. Wenn du unten ein Passwort festlegst, wird auch die klassische Passwort-Anmeldung aktiviert.',
        'no_password_error' => 'Für dieses Konto ist kein Passwort festgelegt. Es kann sich derzeit überhaupt nicht anmelden. Wenn du unten ein Passwort festlegst, wird die klassische Passwort-Anmeldung aktiviert.',
    ],

    'force_unlink' => [
        'button' => 'Trennen (sperrt das Konto)',
        'title' => 'Dieses passwortlose Discord-Konto trennen?',
        'warning' => 'Diese Discord-Verknüpfung ist derzeit der einzige Weg für dieses Konto, sich anzumelden. Das Trennen sperrt das Konto, bis unten ein Passwort dafür festgelegt wird – das geschieht nicht automatisch.',
        'confirm' => 'Trotzdem trennen',
    ],

    'tools' => [
        'title' => 'Discord-Tools',
        'bot_unavailable' => 'Konfiguriere einen Bot-Token in den Plugin-Einstellungen, um das Senden einer DM, eines Wiederherstellungspassworts oder von 2FA-Wiederherstellungscodes freizuschalten.',

        'dm' => [
            'button' => 'DM senden',
            'title' => 'Discord-DM senden',
            'content_label' => 'Nachricht',
            'confirm' => 'Senden',
            'sent' => 'Die Nachricht wurde gesendet.',
            'failed' => 'Die Nachricht konnte nicht gesendet werden - der Bot und dieser Nutzer teilen sich möglicherweise keinen Server, oder der Nutzer hat DMs deaktiviert.',
        ],

        'recovery_password' => [
            'button' => 'Wiederherstellungspasswort senden',
            'title' => 'Wiederherstellungspasswort senden',
            'warning' => 'Dies generiert ein neues zufälliges Passwort, erzwingt dessen Änderung bei der nächsten Anmeldung und sendet es dem Nutzer per Discord-DM.',
            'invalidate_sessions' => 'Auch alle derzeit offenen Sitzungen abmelden',
            'invalidate_sessions_help' => 'Erneuert den „Angemeldet bleiben"-Token und löscht zusätzlich sofort die Sitzungen des Nutzers, falls die Website den Datenbank-Sitzungstreiber verwendet. Bei anderen Sitzungstreibern können bereits offene Sitzungen bis zu ihrem eigenen Ablauf angemeldet bleiben.',
            'confirm' => 'Senden',
            'sent' => 'Das Wiederherstellungspasswort wurde generiert und gesendet.',
        ],

        'refresh' => [
            'button' => 'Discord-Infos aktualisieren',
            'title' => 'Discord-Infos aktualisieren',
            'description' => 'Ruft den aktuellen Discord-Benutzernamen dieses Nutzers (und seinen Avatar, falls die Avatar-Synchronisierung aktiviert ist) von Discord ab, falls er ihn dort geändert hat.',
            'confirm' => 'Aktualisieren',
            'done' => 'Die Discord-Infos wurden aktualisiert.',
            'failed' => 'Discord konnte nicht erreicht werden, um die Infos dieses Kontos zu aktualisieren.',
        ],

        'recovery_codes' => [
            'button' => '2FA-Wiederherstellungscodes senden',
            'title' => '2FA-Wiederherstellungscodes senden',
            'warning' => 'Dies ersetzt die bestehenden Zwei-Faktor-Wiederherstellungscodes des Nutzers durch einen neuen Satz und sendet sie per Discord-DM. Die alten Codes funktionieren sofort nicht mehr.',
            'confirm' => 'Senden',
            'sent' => 'Neue Wiederherstellungscodes wurden generiert und gesendet.',
        ],
    ],

    'role_sync' => [
        'title' => 'Discord-Rollensynchronisierung',
        'description' => 'Vergibt automatisch eine Discord-Serverrolle an Nutzer, die den Bedingungen einer Regel entsprechen, und entzieht sie, sobald sie das nicht mehr tun (in Echtzeit bei relevanten Änderungen geprüft, sowie planmäßig, um auch Fälle wie ein abgelaufenes Abonnement zu erfassen).',
        'bot_unavailable' => 'Konfiguriere oben einen Bot-Token in den Einstellungen, um die Discord-Rollensynchronisierung freizuschalten.',
        'create' => 'Regel erstellen',
        'edit' => 'Regel bearbeiten',
        'empty' => 'Noch keine Synchronisierungsregeln.',
        'guild_id' => 'Server-ID',
        'role_id' => 'Rollen-ID',
        'conditions' => 'Bedingungen',
        'condition_site_roles' => 'Website-Rolle: :roles',
        'condition_shop_package' => 'Besitzt Artikel: :package',
        'condition_balance' => 'Guthaben zwischen :min und :max',
        'no_conditions' => 'Keine (gilt für alle)',
        'conditions_title' => 'Bedingungen',
        'conditions_help' => 'Alle unten festgelegten Bedingungen müssen zusammen erfüllt sein, damit diese Regel ihre Rolle vergibt. Lasse eine Bedingung leer/nicht ausgewählt, um sie nicht zu prüfen. Mehrere Regeln können dieselbe Serverrolle als Ziel haben: Es reicht, einer davon zu entsprechen, um sie zu erhalten.',
        'condition_site_roles_label' => 'Auf bestimmte Website-Rollen beschränken',
        'condition_site_roles_help' => 'Lasse alle Kästchen deaktiviert, um diese Bedingung nicht zu prüfen.',
        'condition_shop_package_label' => 'Erfordert den Besitz dieses Shop-Artikels',
        'no_condition' => 'Diese Bedingung nicht prüfen',
        'balance_min' => 'Mindestguthaben',
        'balance_max' => 'Höchstguthaben',
        'discord_role_title' => 'Zu vergebende Discord-Rolle',
    ],

    'email_warning' => [
        'title' => 'Sicherheitswarnung',
        'body' => 'Die Zuordnung von Konten über die E-Mail-Adresse ist weniger sicher als über die Discord-ID: Jeder, der eine verifizierte E-Mail-Adresse auf Discord kontrolliert, kann sich bei dem Website-Konto mit dieser Adresse anmelden, ohne dass jemals eine Verknüpfung vorgenommen wurde. Wenn ein E-Mail-Konto kompromittiert oder wiederverwendet wird, ist es auch das Website-Konto. Aktiviere diese Option nur, wenn du dieses Risiko verstehst.',
        'confirm' => 'Ich verstehe das Risiko',
    ],

    'info' => [
        'setup' => 'Dieses Plugin verwendet die Discord-Anwendung, die in <a href=":url">Rollenverwaltung &rarr; Rollen mit Discord verknüpfen</a> konfiguriert ist (Client-ID / Client-Secret). Richte sie zuerst dort ein, falls noch nicht geschehen.',
        'redirect_intro' => 'Füge im <b>Discord-Entwicklerportal</b> unter <b>OAuth2</b> &rarr; <b>Allgemein</b> zusätzlich diese URLs zu den <b>Weiterleitungen</b> hinzu (zusätzlich zur Profil-Verknüpfungs-URL):',
    ],

    'test' => [
        'title' => 'Konfiguration testen',
        'description' => 'Prüfe, ob Client-ID/Secret gültig sind, und führe dann eine echte Testanmeldung durch, um zu bestätigen, dass die Weiterleitungs-URLs tatsächlich bei Discord registriert sind (das ist die einzige zuverlässige Methode zur Überprüfung: Discord validiert sie erst beim Autorisierungsbildschirm, nicht vorher).',
        'credentials_button' => 'Client-ID / Secret prüfen',
        'bot_token_button' => 'Bot-Token prüfen',
        'bot_token_ok' => 'Der Bot-Token ist gültig.',
        'bot_token_invalid' => 'Der Bot-Token fehlt oder ist falsch.',
        'callback_button_login' => 'Anmelde-Callback testen',
        'callback_button_confirm' => 'Bestätigungs-Callback testen',
        'callback_help' => 'Diese Schaltflächen leiten dich tatsächlich zu Discord weiter, unter Verwendung der beiden oben aufgeführten URLs. Wenn du mit einer Erfolgsmeldung zu dieser Seite zurückkehrst, bestätigt das, dass die getestete URL registriert ist. Wenn Discord einen Fehler „ungültige redirect_uri" anzeigt, noch bevor du dich anmelden sollst, fehlt diese URL oder ist falsch.',
        'not_configured' => 'Es ist keine Discord-Client-ID / kein Secret konfiguriert. Richte sie zuerst in der Rollenverwaltung ein.',
        'network_error' => 'Die Discord-API konnte nicht erreicht werden. Versuche es später erneut.',
        'credentials_invalid' => 'Die Client-ID oder das Client-Secret ist falsch.',
        'credentials_ok' => 'Die Client-ID und das Client-Secret sind gültig.',
        'callback_failed' => 'Der Test ist fehlgeschlagen. Prüfe, ob die getestete Weiterleitungs-URL bei Discord registriert ist und ob das Client-Secret korrekt ist.',
        'callback_ok' => 'Test erfolgreich als :name — diese Weiterleitungs-URL ist korrekt bei Discord registriert.',
    ],
];
