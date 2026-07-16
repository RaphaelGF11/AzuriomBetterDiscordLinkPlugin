<?php

return [
    'permission' => 'Hallitse Discord-kirjautumisasetuksia',
    'allow_duplicates' => 'Salli päällekkäiset Discord-yhdistämiset',
    'allow_duplicates_help' => 'Jos käytössä, sama Discord-tili voidaan yhdistää useisiin sivuston tileihin; kirjautuessaan käyttäjä valitsee, mihin tiliin hän haluaa kirjautua. Jos ei käytössä, yhdistäminen evätään, jos tämä Discord on jo yhdistetty toiseen tiliin.',
    'allow_passwordless' => 'Salli tilien luominen ilman salasanaa',
    'allow_passwordless_help' => 'Jos käytössä, salasana on valinnainen rekisteröidyttäessä Discordilla (tili voi tällöin kirjautua vain Discordin kautta, kunnes salasana asetetaan profiilista). Jos ei käytössä, salasana vaaditaan tilin luomiseen Discordilla.',
    'http_warning' => 'Tämä sivusto ladataan HTTP:n kautta (ei turvallinen). Discord hyväksyy vain HTTPS-uudelleenohjaus-URL-osoitteita, paitsi localhost/127.0.0.1-poikkeuksen paikallista kehitystä varten. Callbackit epäonnistuvat, kunnes sivustoa tarjoillaan HTTPS:n kautta.',
    'custom_credentials' => 'Käytä omia Discord-tunnuksia',
    'custom_credentials_help' => 'Jos käytössä, tämä laajennus käyttää alla olevaa client ID / secret -paria roolienhallinnassa määritettyjen sijaan. Yllä listatut uudelleenohjaus-URL-osoitteet on tällöin lisättävä kyseiseen erilliseen Discord-sovellukseen.',
    'bot_token' => 'Bot-token',
    'bot_token_help' => 'Discord-botin token, joka on kutsuttu palvelimellesi/palvelimillesi oikeuksilla "Hallitse rooleja" ja "Luo pikakutsu". Tarvitaan Discordin ylläpitotyökaluihin, roolisynkronointiin ja alla olevaan "Rajoita palvelimen jäseniin" -asetukseen - muutoin valinnainen.',
    'bot_token_shared_help' => 'Käytetään tällä hetkellä uudelleen bot-tokenia, joka on jo määritetty Roolienhallinta &rarr; Yhdistä roolit Discordiin -sivulla. Ota käyttöön yllä "Käytä omia Discord-tunnuksia" käyttääksesi eri bottia.',
    'customizable_email' => 'Salli muokattava rekisteröitymissähköposti',
    'customizable_email_help' => 'Jos käytössä, käyttäjä voi valita eri sähköpostiosoitteen kuin Discord-tilinsä osoitteen rekisteröitymisen viimeistelyn yhteydessä, sen sijaan että olisi sidottu Discordin sähköpostiin. Ei voida ottaa käyttöön yhdessä asetuksen "Kohdista tilit sähköpostiosoitteen perusteella" kanssa.',
    'match_by_email' => 'Kohdista tilit sähköpostiosoitteen perusteella',
    'match_by_email_help' => 'Jos käytössä, kun mitään tiliä ei ole yhdistetty kyseiseen Discordiin, kirjautuminen yrittää löytää sivuston tilin, jonka sähköpostiosoite vastaa (vahvistettua) Discord-sähköpostia. Selkeät yhdistämiset ovat aina etusijalla.',
    'incompatible_with_match_by_email' => 'Tätä asetusta ei voi ottaa käyttöön samaan aikaan asetuksen ":option" kanssa.',
    'sync_avatar' => 'Synkronoi avatar Discordin kanssa',
    'sync_avatar_help' => 'Jos käytössä, käyttäjän sivuston avatar asetetaan hänen Discord-avatarikseen jokaisella kirjautumisella/rekisteröitymisellä, sekä aina kun ylläpitäjä käyttää alla olevaa "Päivitä Discord-tiedot" -toimintoa.',
    'required_guild' => 'Rajoita palvelimen jäseniin',
    'required_guild_help' => 'Jos palvelin-ID on asetettu, Discordilla kirjautuminen tai rekisteröityminen edellyttää kyseisen palvelimen jäsenyyttä - käyttäjä lisätään siihen automaattisesti (Discord itse pyytää hänen suostumustaan "guilds.join"-oikeuteen valtuutusnäytöllä), jos hän ei jo ole jäsen. Vaatii yllä olevan bot-tokenin, joka on kutsuttu kyseiselle palvelimelle "Luo pikakutsu" -oikeudella. Jätä palvelin-ID tyhjäksi poistaaksesi tämän rajoituksen käytöstä.',
    'required_guild_id' => 'Palvelimen ID',
    'bypass_maintenance' => 'Salli Discord-kirjautuminen huoltokatkon aikana',
    'bypass_maintenance_help' => 'Jos käytössä, Discord-kirjautuminen pysyy mahdollisena, vaikka huoltotila olisi käytössä, ilman huoltoon pääsyoikeutta. Jos ei käytössä, noudatetaan samoja sääntöjä kuin perinteisessä kirjautumisessa.',

    'users' => [
        'no_password_warning' => 'Tälle tilille ei ole asetettu salasanaa. Se voi tällä hetkellä kirjautua sisään vain Discordin kautta. Salasanan asettaminen alla ottaa käyttöön myös perinteisen salasanakirjautumisen.',
        'no_password_error' => 'Tälle tilille ei ole asetettu salasanaa. Se ei tällä hetkellä voi kirjautua sisään lainkaan. Salasanan asettaminen alla ottaa käyttöön perinteisen salasanakirjautumisen.',
    ],

    'force_unlink' => [
        'button' => 'Poista yhdistäminen (lukitsee tilin)',
        'title' => 'Poistetaanko tämän salasanattoman Discord-tilin yhdistäminen?',
        'warning' => 'Tämä Discord-yhteys on tällä hetkellä tämän tilin ainoa tapa kirjautua sisään. Yhdistämisen poistaminen lukitsee tilin, kunnes sille asetetaan salasana alla – tätä ei tehdä automaattisesti.',
        'confirm' => 'Poista yhdistäminen silti',
    ],

    'tools' => [
        'title' => 'Discord-työkalut',
        'bot_unavailable' => 'Määritä bot-token laajennuksen asetuksissa avataksesi DM-viestin, palautussalasanan tai 2FA-palautuskoodien lähettämisen.',

        'dm' => [
            'button' => 'Lähetä DM-viesti',
            'title' => 'Lähetä Discord-DM',
            'content_label' => 'Viesti',
            'confirm' => 'Lähetä',
            'sent' => 'Viesti lähetettiin.',
            'failed' => 'Viestiä ei voitu lähettää - botilla ja tällä käyttäjällä ei ehkä ole yhteistä palvelinta, tai käyttäjä on estänyt yksityisviestit.',
        ],

        'recovery_password' => [
            'button' => 'Lähetä palautussalasana',
            'title' => 'Lähetä palautussalasana',
            'warning' => 'Tämä luo uuden satunnaisen salasanan, pakottaa sen vaihtamisen seuraavalla kirjautumiskerralla ja lähettää sen käyttäjälle Discord-DM:llä.',
            'invalidate_sessions' => 'Kirjaa myös ulos kaikista tällä hetkellä avoinna olevista istunnoista',
            'invalidate_sessions_help' => 'Uusii "muista minut" -tunnisteen ja tyhjentää lisäksi käyttäjän istunnot heti, jos sivusto käyttää tietokantapohjaista istuntoajuria. Muilla istuntoajureilla jo avoimet istunnot voivat pysyä kirjautuneina, kunnes ne vanhenevat itsestään.',
            'confirm' => 'Lähetä',
            'sent' => 'Palautussalasana luotiin ja lähetettiin.',
        ],

        'refresh' => [
            'button' => 'Päivitä Discord-tiedot',
            'title' => 'Päivitä Discord-tiedot',
            'description' => 'Hakee tämän käyttäjän nykyisen Discord-käyttäjänimen (ja avatarin, jos avatarin synkronointi on käytössä) Discordista, siltä varalta että hän on vaihtanut sen siellä.',
            'confirm' => 'Päivitä',
            'done' => 'Discord-tiedot päivitettiin.',
            'failed' => 'Discordiin ei saatu yhteyttä tämän tilin tietojen päivittämiseksi.',
        ],

        'recovery_codes' => [
            'button' => 'Lähetä 2FA-palautuskoodit',
            'title' => 'Lähetä 2FA-palautuskoodit',
            'warning' => 'Tämä korvaa käyttäjän nykyiset kaksivaiheiset palautuskoodit uudella sarjalla ja lähettää ne Discord-DM:llä. Vanhat koodit lakkaavat toimimasta välittömästi.',
            'confirm' => 'Lähetä',
            'sent' => 'Uudet palautuskoodit luotiin ja lähetettiin.',
        ],
    ],

    'role_sync' => [
        'title' => 'Discord-roolisynkronointi',
        'description' => 'Myöntää automaattisesti Discord-palvelimen roolin säännön ehdot täyttäville käyttäjille ja poistaa sen heti, kun he eivät enää täytä niitä (tarkistetaan reaaliajassa asiaankuuluvien muutosten yhteydessä, ja aikataulun mukaisesti, jotta myös esimerkiksi vanhentunut tilaus havaitaan).',
        'bot_unavailable' => 'Määritä bot-token yllä olevissa asetuksissa avataksesi Discord-roolisynkronoinnin.',
        'create' => 'Luo sääntö',
        'edit' => 'Muokkaa sääntöä',
        'empty' => 'Ei vielä synkronointisääntöjä.',
        'guild_id' => 'Palvelimen ID',
        'role_id' => 'Roolin ID',
        'conditions' => 'Ehdot',
        'condition_site_roles' => 'Sivuston rooli: :roles',
        'condition_shop_package' => 'Omistaa tuotteen: :package',
        'condition_balance' => 'Saldo välillä :min–:max',
        'no_conditions' => 'Ei mitään (koskee kaikkia)',
        'conditions_title' => 'Ehdot',
        'conditions_help' => 'Kaikkien alla asetettujen ehtojen on täytyttävä yhdessä, jotta tämä sääntö myöntää roolinsa. Jätä ehto tyhjäksi/valitsematta, jos et halua tarkistaa sitä. Useampi sääntö voi kohdistua samaan palvelimen rooliin: yhden täyttäminen riittää sen saamiseen.',
        'condition_site_roles_label' => 'Rajoita tiettyihin sivuston rooleihin',
        'condition_site_roles_help' => 'Jätä kaikki valintaruudut tyhjiksi, jos et halua tarkistaa tätä ehtoa.',
        'condition_shop_package_label' => 'Vaatii tämän kaupan tuotteen omistamisen',
        'no_condition' => 'Älä tarkista tätä ehtoa',
        'balance_min' => 'Vähimmäissaldo',
        'balance_max' => 'Enimmäissaldo',
        'discord_role_title' => 'Myönnettävä Discord-rooli',
    ],

    'email_warning' => [
        'title' => 'Turvallisuusvaroitus',
        'body' => 'Tilien kohdistaminen sähköpostiosoitteen perusteella on vähemmän turvallista kuin Discord-tunnuksen perusteella: kuka tahansa, joka hallitsee vahvistettua sähköpostiosoitetta Discordissa, pystyy kirjautumaan sivuston tiliin, jolla on kyseinen osoite, ilman että yhdistämistä on koskaan tehty. Jos sähköpostitili vaarantuu tai käytetään uudelleen, sama koskee sivuston tiliä. Ota tämä asetus käyttöön vain, jos ymmärrät tämän riskin.',
        'confirm' => 'Ymmärrän riskin',
    ],

    'info' => [
        'setup' => 'Tämä laajennus käyttää uudelleen kohdassa <a href=":url">Roolienhallinta &rarr; Yhdistä roolit Discordiin</a> määritettyä Discord-sovellusta (client ID / client secret). Määritä se sinne ensin, jos et ole vielä tehnyt niin.',
        'redirect_intro' => 'Lisää <b>Discordin kehittäjäportaalissa</b>, kohdassa <b>OAuth2</b> &rarr; <b>Yleiset</b>, nämä URL-osoitteet <b>Redirects</b>-kenttään (profiilin yhdistämisen lisäksi):',
    ],

    'test' => [
        'title' => 'Testaa määrityksiä',
        'description' => 'Tarkista, että client ID/secret ovat kelvollisia, ja suorita sitten oikea testikirjautuminen varmistaaksesi, että uudelleenohjaus-URL-osoitteet on todella rekisteröity Discordiin (tämä on ainoa luotettava tapa tarkistaa: Discord vahvistaa ne vasta valtuutusnäytöllä, ei sitä ennen).',
        'credentials_button' => 'Tarkista client ID / secret',
        'bot_token_button' => 'Tarkista bot-token',
        'bot_token_ok' => 'Bot-token on kelvollinen.',
        'bot_token_invalid' => 'Bot-token puuttuu tai on virheellinen.',
        'callback_button_login' => 'Testaa kirjautumisen callback',
        'callback_button_confirm' => 'Testaa vahvistuksen callback',
        'callback_help' => 'Nämä painikkeet ohjaavat sinut oikeasti Discordiin käyttäen kahta yllä listattua URL-osoitetta. Jos palaat tälle sivulle onnistumisviestin kanssa, se vahvistaa, että testattu URL-osoite on rekisteröity. Jos Discord näyttää "invalid redirect_uri" -virheen jo ennen kuin sinua pyydetään kirjautumaan, kyseinen URL-osoite puuttuu tai on väärä.',
        'not_configured' => 'Discordin client ID / secret -paria ei ole määritetty. Määritä ne ensin roolienhallinnassa.',
        'network_error' => 'Discordin API:in ei saatu yhteyttä. Yritä myöhemmin uudelleen.',
        'credentials_invalid' => 'Client ID tai client secret on virheellinen.',
        'credentials_ok' => 'Client ID ja client secret ovat kelvollisia.',
        'callback_failed' => 'Testi epäonnistui. Tarkista, että testattu uudelleenohjaus-URL on rekisteröity Discordiin ja että client secret on oikein.',
        'callback_ok' => 'Testi onnistui nimellä :name — tämä uudelleenohjaus-URL on oikein rekisteröity Discordiin.',
    ],
];
