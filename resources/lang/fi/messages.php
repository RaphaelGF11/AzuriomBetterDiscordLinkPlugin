<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'Tämä Discord-tili on jo yhdistetty toiseen tiliin.',
    'email_mismatch' => 'Kirjautuminen onnistui. Varoitus: Discord-tilisi sähköpostiosoite ei vastaa tilisi sähköpostiosoitetta.',
    'password_login_disabled' => 'Tälle tilille ei ole asetettu salasanaa: kirjaudu sen sijaan Discordilla.',
    'guild_required' => 'Sinun on liityttävä Discord-palvelimellemme ennen kuin voit kirjautua sisään tai rekisteröityä Discordilla.',
    'guild_notice' => 'Sinun on liityttävä Discord-palvelimellemme yhdistääksesi tilisi.',

    'login' => [
        'button' => 'Kirjaudu sisään Discordilla',
    ],

    'register' => [
        'button' => 'Rekisteröidy Discordilla',
        'title' => 'Viimeistele rekisteröitymisesi',
        'not_found' => 'Tähän Discordiin ei ole vielä yhdistetty tiliä. Täytä alla olevat tiedot luodaksesi tilisi.',
        'duplicate_notice' => 'Tämä Discord-tili on jo yhdistetty toiseen tiliin, mutta päätit silti luoda uuden. Täytä alla olevat tiedot.',
        'email_help' => 'Discord-tilisi sähköposti, jota käytetään tilillesi.',
        'password_optional' => 'Salasana (valinnainen)',
        'password_help' => 'Jos et aseta salasanaa, voit kirjautua sisään vain Discordin kautta (voit asettaa sen myöhemmin profiilistasi).',
        'submit' => 'Luo tilini',
        'email_used' => 'Tämä sähköpostiosoite on jo toisen tilin käytössä.',
    ],

    'choose' => [
        'title' => 'Useita tilejä on yhdistetty tähän Discordiin',
        'description' => 'Valitse, mihin tiliin haluat kirjautua.',
    ],

    'conflict' => [
        'title' => 'Tämä Discord on jo yhdistetty',
        'already_linked' => 'Tämä Discord-tili on jo yhdistetty sivustolla olevaan tiliin. Voit kirjautua kyseiseen tiliin tai luoda uuden, jos kaksoiskappaleet ovat sallittuja.',
        'login' => 'Kirjaudu olemassa olevaan tiliin',
        'register' => 'Luo silti uusi tili',
    ],

    'confirm' => [
        'description' => 'Tililläsi ei ole salasanaa: vahvista henkilöllisyytesi kirjautumalla uudelleen Discordiin.',
        'button' => 'Vahvista Discordilla',
        'mismatch' => 'Tämä ei ole profiiliisi yhdistetty Discord-tili.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Discord-kirjautuminen yhdistetty käyttäjään :name.',
        'bypass_2fa' => 'Salli Discord-kirjautumisen ohittaa kaksivaiheinen tunnistautuminen',
        'no_password' => 'Tilillesi ei ole asetettu salasanaa. Voit luoda sen täällä, jotta voit kirjautua myös ilman Discordia.',
        'set_password' => 'Aseta salasana',
        'unlink_locked' => 'Sinun on ensin asetettava salasana ennen Discord-tilisi yhdistämisen poistamista, muuten et voisi enää kirjautua tilillesi.',
    ],

    'tools' => [
        'recovery_dm' => "Hei! Sivuston :site ylläpitäjä loi tilillesi uuden salasanan:\n\n:password\n\nSinua pyydetään vaihtamaan se seuraavalla kirjautumiskerralla.",
        'recovery_codes_dm' => "Hei! Sivuston :site ylläpitäjä loi kaksivaiheiset palautuskoodisi uudelleen. Aiemmat koodisi eivät enää toimi. Tässä uudet koodisi - säilytä ne turvallisessa paikassa:\n\n:codes",
    ],
];
