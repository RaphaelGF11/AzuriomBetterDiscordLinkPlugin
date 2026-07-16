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
    'match_by_email' => 'Konten anhand der E-Mail-Adresse zuordnen',
    'match_by_email_help' => 'Wenn aktiviert, versucht die Anmeldung, falls kein Konto mit diesem Discord-Konto verknüpft ist, ein Website-Konto zu finden, dessen E-Mail-Adresse mit der (verifizierten) Discord-E-Mail übereinstimmt. Explizite Verknüpfungen haben immer Vorrang.',

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
