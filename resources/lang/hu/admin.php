<?php

return [
    'permission' => 'Discord bejelentkezési beállítások kezelése',
    'allow_duplicates' => 'Ismétlődő Discord-kapcsolatok engedélyezése',
    'allow_duplicates_help' => 'Ha engedélyezve van, ugyanaz a Discord-fiók több oldalfiókhoz is kapcsolható; bejelentkezéskor a felhasználó választja ki, melyik fiókba jelentkezik be. Ha le van tiltva, az összekapcsolás elutasításra kerül, ha ez a Discord már össze van kapcsolva egy másik fiókkal.',
    'allow_passwordless' => 'Jelszó nélküli fiókok létrehozásának engedélyezése',
    'allow_passwordless_help' => 'Ha engedélyezve van, a jelszó opcionális a Discorddal történő regisztráció során (a fiók ekkor csak Discorddal tud bejelentkezni, amíg a profilból be nem állítanak egy jelszót). Ha le van tiltva, a Discorddal történő fiók létrehozásához jelszó szükséges.',
    'http_warning' => 'Ez az oldal HTTP-n keresztül töltődik be (nem biztonságos). A Discord csak HTTPS átirányítási URL-eket fogad el, kivéve a localhost/127.0.0.1 kivételt a helyi fejlesztéshez. A callback-ek addig nem fognak működni, amíg az oldal HTTPS-en keresztül nem lesz kiszolgálva.',
    'custom_credentials' => 'Dedikált Discord hitelesítő adatok használata',
    'custom_credentials_help' => 'Ha engedélyezve van, ez a bővítmény az alábbi client ID / secret párost fogja használni a szerepkör-kezelésben beállított helyett. A fent felsorolt átirányítási URL-eket ekkor hozzá kell adni ehhez a dedikált Discord-alkalmazáshoz.',
    'bot_token' => 'Bot token',
    'bot_token_help' => 'Egy Discord-bot tokenje, amely meg lett hívva a szervered(ek)re a "Szerepkörök kezelése" és a "Azonnali meghívó létrehozása" jogosultságokkal. Szükséges a Discord admin eszközökhöz, a szerepkör-szinkronizáláshoz és az alábbi "Korlátozás a szerver tagjaira" opcióhoz - egyébként opcionális.',
    'bot_token_shared_help' => 'Jelenleg a Szerepkör-kezelés &rarr; Szerepkörök összekapcsolása Discorddal oldalon már beállított bot tokent használja újra. Kapcsold be fent a "Dedikált Discord hitelesítő adatok használata" opciót, hogy másik botot használj.',
    'customizable_email' => 'Testreszabható regisztrációs e-mail engedélyezése',
    'customizable_email_help' => 'Ha engedélyezve van, a felhasználó a regisztráció befejezésekor a Discord-fiókjától eltérő e-mail címet is választhat, ahelyett hogy a Discord e-mail címéhez lenne kötve. Nem engedélyezhető egyszerre a "Fiókok párosítása e-mail cím alapján" beállítással.',
    'match_by_email' => 'Fiókok párosítása e-mail cím alapján',
    'match_by_email_help' => 'Ha engedélyezve van, amikor egyetlen fiók sincs összekapcsolva ezzel a Discorddal, a bejelentkezés megpróbál olyan oldalfiókot találni, amelynek e-mail címe megegyezik a (megerősített) Discord e-mail címmel. Az explicit összekapcsolások mindig elsőbbséget élveznek.',
    'incompatible_with_match_by_email' => 'Ez a beállítás nem engedélyezhető egyszerre a(z) „:option” beállítással.',
    'sync_avatar' => 'Avatar szinkronizálása Discorddal',
    'sync_avatar_help' => 'Ha engedélyezve van, a felhasználó oldalbeli avatarja minden bejelentkezéskor/regisztrációkor, valamint minden alkalommal, amikor egy admin az alábbi "Discord-adatok frissítése" funkciót használja, a Discord-avatarjára lesz állítva.',
    'required_guild' => 'Korlátozás a szerver tagjaira',
    'required_guild_help' => 'Ha meg van adva egy szerver-ID, a Discorddal történő bejelentkezés vagy regisztráció megköveteli az adott szerver tagságát - a felhasználó automatikusan hozzáadásra kerül (a "guilds.join" jogosultsághoz való hozzájárulását maga a Discord kéri be az engedélyezési képernyőn), ha még nem tag. Szükséges a fenti bot token, amelyet meghívtak erre a szerverre az "Azonnali meghívó létrehozása" jogosultsággal. Hagyd üresen a szerver-ID-t ennek a korlátozásnak a kikapcsolásához.',
    'required_guild_id' => 'Szerver-ID',
    'bypass_maintenance' => 'Discord bejelentkezés engedélyezése karbantartás alatt',
    'bypass_maintenance_help' => 'Ha engedélyezve van, a Discorddal történő bejelentkezés akkor is lehetséges marad, amikor a karbantartási mód aktív, anélkül hogy szükség lenne a karbantartási hozzáférési jogosultságra. Ha le van tiltva, ugyanazok a szabályok érvényesek, mint a hagyományos bejelentkezésnél.',

    'users' => [
        'no_password_warning' => 'Ehhez a fiókhoz nincs jelszó beállítva. Jelenleg csak Discorddal tud bejelentkezni. Az alábbi jelszó beállítása a hagyományos jelszavas bejelentkezést is engedélyezi.',
        'no_password_error' => 'Ehhez a fiókhoz nincs jelszó beállítva. Jelenleg egyáltalán nem tud bejelentkezni. Az alábbi jelszó beállítása engedélyezi a hagyományos jelszavas bejelentkezést.',
    ],

    'force_unlink' => [
        'button' => 'Leválasztás (lezárja a fiókot)',
        'title' => 'Leválasztod ezt a jelszó nélküli Discord-fiókot?',
        'warning' => 'Ez a Discord-kapcsolat jelenleg az egyetlen módja annak, hogy ez a fiók bejelentkezzen. A leválasztás lezárja a fiókot, amíg alább nem kap jelszót – ez nem történik meg automatikusan.',
        'confirm' => 'Leválasztás mindenképp',
    ],

    'tools' => [
        'title' => 'Discord eszközök',
        'bot_unavailable' => 'Állíts be egy bot tokent a bővítmény beállításaiban egy DM, egy helyreállító jelszó, vagy 2FA helyreállító kódok küldésének feloldásához.',

        'dm' => [
            'button' => 'DM küldése',
            'title' => 'Discord DM küldése',
            'content_label' => 'Üzenet',
            'confirm' => 'Küldés',
            'sent' => 'Az üzenet elküldve.',
            'failed' => 'Az üzenetet nem sikerült elküldeni - a bot és ez a felhasználó lehet, hogy nem osztoznak szerveren, vagy a felhasználó letiltotta a DM-eket.',
        ],

        'recovery_password' => [
            'button' => 'Helyreállító jelszó küldése',
            'title' => 'Helyreállító jelszó küldése',
            'warning' => 'Ez egy új, véletlenszerű jelszót generál, kikényszeríti annak megváltoztatását a következő bejelentkezéskor, és elküldi a felhasználónak Discord DM-ben.',
            'invalidate_sessions' => 'Az összes jelenleg nyitott munkamenetből is jelentkezzen ki',
            'invalidate_sessions_help' => 'Megújítja az "emlékezz rám" tokent, és emellett azonnal törli a felhasználó munkameneteit, ha az oldal az adatbázis munkamenet-illesztőt használja. Más munkamenet-illesztőkkel a már nyitott munkamenetek a saját lejáratukig bejelentkezve maradhatnak.',
            'confirm' => 'Küldés',
            'sent' => 'A helyreállító jelszó létrejött és elküldve.',
        ],

        'refresh' => [
            'button' => 'Discord-adatok frissítése',
            'title' => 'Discord-adatok frissítése',
            'description' => 'Lekéri ennek a felhasználónak az aktuális Discord felhasználónevét (és avatarját, ha az avatar-szinkronizálás engedélyezve van) a Discordtól, arra az esetre, ha ott megváltoztatta volna.',
            'confirm' => 'Frissítés',
            'done' => 'A Discord-adatok frissítve.',
            'failed' => 'Nem sikerült elérni a Discordot ennek a fióknak az adatai frissítéséhez.',
        ],

        'recovery_codes' => [
            'button' => '2FA helyreállító kódok küldése',
            'title' => '2FA helyreállító kódok küldése',
            'warning' => 'Ez lecseréli a felhasználó meglévő kétfaktoros helyreállító kódjait egy új készletre, és elküldi őket Discord DM-ben. A régi kódok azonnal érvényüket vesztik.',
            'confirm' => 'Küldés',
            'sent' => 'Új helyreállító kódok jöttek létre és lettek elküldve.',
        ],
    ],

    'role_sync' => [
        'title' => 'Discord szerepkör-szinkronizálás',
        'description' => 'Automatikusan Discord szerver szerepkört ad azoknak a felhasználóknak, akik megfelelnek egy szabály feltételeinek, és eltávolítja azt, amint már nem felelnek meg (valós időben ellenőrizve a releváns változásoknál, valamint ütemezetten, hogy olyan eseteket is elkapjon, mint egy lejárt előfizetés).',
        'bot_unavailable' => 'Állíts be egy bot tokent a fenti beállításokban a Discord szerepkör-szinkronizálás feloldásához.',
        'create' => 'Szabály létrehozása',
        'edit' => 'Szabály szerkesztése',
        'empty' => 'Még nincsenek szinkronizálási szabályok.',
        'guild_id' => 'Szerver-ID',
        'role_id' => 'Szerepkör-ID',
        'conditions' => 'Feltételek',
        'condition_site_roles' => 'Oldal szerepköre: :roles',
        'condition_shop_package' => 'Birtokolja a terméket: :package',
        'condition_balance' => 'Egyenleg :min és :max között',
        'no_conditions' => 'Nincs (mindenkire vonatkozik)',
        'conditions_title' => 'Feltételek',
        'conditions_help' => 'Az alább beállított összes feltételnek együtt kell teljesülnie ahhoz, hogy ez a szabály megadja a szerepkörét. Hagyj egy feltételt üresen/kiválasztatlanul, ha nem szeretnéd ellenőrizni. Több szabály is célozhatja ugyanazt a szerver szerepkört: elég egynek megfelelni a megszerzéséhez.',
        'condition_site_roles_label' => 'Korlátozás bizonyos oldal szerepkörökre',
        'condition_site_roles_help' => 'Hagyd az összes jelölőnégyzetet üresen, ha nem szeretnéd ellenőrizni ezt a feltételt.',
        'condition_shop_package_label' => 'Megköveteli ennek a shop terméknek a birtoklását',
        'no_condition' => 'Ne ellenőrizd ezt a feltételt',
        'balance_min' => 'Minimális egyenleg',
        'balance_max' => 'Maximális egyenleg',
        'discord_role_title' => 'Megadandó Discord szerepkör',
    ],

    'email_warning' => [
        'title' => 'Biztonsági figyelmeztetés',
        'body' => 'A fiókok e-mail cím alapú párosítása kevésbé biztonságos, mint a Discord-azonosító alapján: bárki, aki egy megerősített e-mail címet birtokol a Discordon, be tud jelentkezni az ezzel a címmel rendelkező oldalfiókba, anélkül hogy valaha is összekapcsolás történt volna. Ha egy e-mail fiók veszélybe kerül vagy újra felhasználják, ugyanez vonatkozik az oldalfiókra is. Csak akkor engedélyezd ezt a beállítást, ha megérted ezt a kockázatot.',
        'confirm' => 'Megértem a kockázatot',
    ],

    'info' => [
        'setup' => 'Ez a bővítmény a <a href=":url">Szerepkör-kezelés &rarr; Szerepkörök összekapcsolása Discorddal</a> menüpontban beállított Discord-alkalmazást használja újra (client ID / client secret). Ha még nem tetted meg, először ott állítsd be.',
        'redirect_intro' => 'A <b>Discord fejlesztői portálján</b>, az <b>OAuth2</b> &rarr; <b>Általános</b> részben add hozzá ezeket az URL-eket is az <b>Átirányításokhoz</b> (a profilösszekapcsoláshoz tartozó mellett):',
    ],

    'test' => [
        'title' => 'Konfiguráció tesztelése',
        'description' => 'Ellenőrizd, hogy a client ID/secret érvényes-e, majd futtass egy valódi tesztbejelentkezést annak megerősítésére, hogy az átirányítási URL-ek valóban regisztrálva vannak a Discordon (ez az egyetlen megbízható ellenőrzési mód: a Discord csak az engedélyezési képernyőn validálja őket, előtte nem).',
        'credentials_button' => 'Client ID / secret ellenőrzése',
        'bot_token_button' => 'Bot token ellenőrzése',
        'bot_token_ok' => 'A bot token érvényes.',
        'bot_token_invalid' => 'A bot token hiányzik vagy helytelen.',
        'callback_button_login' => 'Bejelentkezési callback tesztelése',
        'callback_button_confirm' => 'Megerősítési callback tesztelése',
        'callback_help' => 'Ezek a gombok ténylegesen átirányítanak a Discordra, a fent felsorolt két URL-t használva. Ha sikeres üzenettel térsz vissza erre az oldalra, ez megerősíti, hogy a tesztelt URL regisztrálva van. Ha a Discord "invalid redirect_uri" hibát jelenít meg még azelőtt, hogy bejelentkezésre kérne, akkor az az URL hiányzik vagy hibás.',
        'not_configured' => 'Nincs beállítva Discord client ID / secret. Először állítsd be őket a szerepkör-kezelésben.',
        'network_error' => 'Nem sikerült elérni a Discord API-t. Próbáld újra később.',
        'credentials_invalid' => 'A client ID vagy a client secret helytelen.',
        'credentials_ok' => 'A client ID és a client secret érvényesek.',
        'callback_failed' => 'A teszt sikertelen volt. Ellenőrizd, hogy a tesztelt átirányítási URL regisztrálva van-e a Discordon, és hogy a client secret helyes-e.',
        'callback_ok' => 'A teszt sikeres volt :name néven — ez az átirányítási URL helyesen regisztrálva van a Discordon.',
    ],
];
