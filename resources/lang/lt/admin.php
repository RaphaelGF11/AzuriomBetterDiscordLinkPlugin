<?php

return [
    'permission' => 'Tvarkyti Discord prisijungimo nustatymus',
    'allow_duplicates' => 'Leisti dubliuotus Discord susiejimus',
    'allow_duplicates_help' => 'Jei įjungta, ta pati Discord paskyra gali būti susieta su keliomis svetainės paskyromis; prisijungdamas naudotojas pasirinks, prie kurios paskyros prisijungti. Jei išjungta, susiejimas atmetamas, jei šis Discord jau susietas su kita paskyra.',
    'allow_passwordless' => 'Leisti kurti paskyras be slaptažodžio',
    'allow_passwordless_help' => 'Jei įjungta, registruojantis su Discord slaptažodis yra neprivalomas (paskyra tuomet galės prisijungti tik per Discord, kol profilyje bus nustatytas slaptažodis). Jei išjungta, norint sukurti paskyrą su Discord, reikalingas slaptažodis.',
    'http_warning' => 'Ši svetainė įkeliama per HTTP (nesaugu). Discord priima tik HTTPS peradresavimo URL, išskyrus localhost/127.0.0.1 išimtį vietinei plėtrai. Atgaliniai iškvietimai (callback) nepavyks, kol svetainė nebus aptarnaujama per HTTPS.',
    'custom_credentials' => 'Naudoti atskirus Discord prisijungimo duomenis',
    'custom_credentials_help' => 'Jei įjungta, šis papildinys naudos toliau nurodytus client ID / secret vietoj sukonfigūruotų vaidmenų valdyme. Aukščiau nurodyti peradresavimo URL turės būti pridėti prie tos atskiros Discord programėlės.',
    'bot_token' => 'Boto žetonas',
    'bot_token_help' => 'Discord boto žetonas, pakviestas į jūsų serverį(-ius) su „Valdyti vaidmenis" ir „Kurti akimirksniu kvietimą" leidimais. Reikalingas Discord administravimo įrankiams, vaidmenų sinchronizavimui ir toliau esančiai parinkčiai „Riboti tik serverio nariams" - kitu atveju neprivalomas.',
    'bot_token_shared_help' => 'Šiuo metu naudojamas boto žetonas, jau sukonfigūruotas puslapyje Vaidmenų valdymas &rarr; Susieti vaidmenis su Discord. Įjunkite aukščiau „Naudoti atskirus Discord prisijungimo duomenis", kad naudotumėte kitą botą.',
    'customizable_email' => 'Leisti pasirinktinį registracijos el. paštą',
    'customizable_email_help' => 'Jei įjungta, baigdamas registraciją naudotojas gali pasirinkti kitą el. pašto adresą nei jo Discord el. paštas, o ne būti apribotas Discord el. paštu. Negalima įjungti kartu su „Susieti paskyras pagal el. pašto adresą“.',
    'match_by_email' => 'Susieti paskyras pagal el. pašto adresą',
    'match_by_email_help' => 'Jei įjungta, kai su tuo Discord nesusieta jokia paskyra, prisijungimas bandys rasti svetainės paskyrą, kurios el. pašto adresas sutampa su (patvirtintu) Discord el. paštu. Aiškūs susiejimai visada turi pirmenybę.',
    'incompatible_with_match_by_email' => 'Šio nustatymo negalima įjungti kartu su „:option“.',
    'sync_avatar' => 'Sinchronizuoti avatarą su Discord',
    'sync_avatar_help' => 'Jei įjungta, naudotojo svetainės avataras bus nustatytas pagal jo Discord avatarą kiekvieną kartą prisijungiant/registruojantis, taip pat kaskart, kai administratorius naudoja žemiau esantį „Atnaujinti Discord informaciją".',
    'required_guild' => 'Riboti tik serverio nariams',
    'required_guild_help' => 'Jei nustatytas serverio ID, norint prisijungti ar registruotis su Discord, reikia būti to serverio nariu - naudotojas automatiškai pridedamas (jo sutikimo dėl „guilds.join" leidimo klausia pats Discord, autorizacijos ekrane), jei jis dar nėra narys. Reikalingas aukščiau esantis boto žetonas, pakviestas į tą serverį su „Kurti akimirksniu kvietimą" leidimu. Palikite serverio ID tuščią, kad išjungtumėte šį apribojimą.',
    'required_guild_id' => 'Serverio ID',
    'bypass_maintenance' => 'Leisti prisijungti per Discord priežiūros metu',
    'bypass_maintenance_help' => 'Jei įjungta, prisijungimas per Discord išlieka galimas net kai aktyvus priežiūros režimas, nereikalaujant priežiūros prieigos leidimo. Jei išjungta, taikomos tos pačios taisyklės kaip ir įprastam prisijungimui.',

    'users' => [
        'no_password_warning' => 'Šiai paskyrai nenustatytas slaptažodis. Šiuo metu prisijungti galima tik per Discord. Nustačius slaptažodį žemiau, bus įjungtas ir klasikinis prisijungimas slaptažodžiu.',
        'no_password_error' => 'Šiai paskyrai nenustatytas slaptažodis. Šiuo metu ji visiškai negali prisijungti. Nustačius slaptažodį žemiau, bus įjungtas klasikinis prisijungimas slaptažodžiu.',
    ],

    'force_unlink' => [
        'button' => 'Atsieti (užrakins paskyrą)',
        'title' => 'Atsieti šią Discord paskyrą be slaptažodžio?',
        'warning' => 'Šis Discord ryšys šiuo metu yra vienintelis būdas šiai paskyrai prisijungti. Atsiejus jį, paskyra bus užrakinta, kol žemiau nebus nustatytas slaptažodis – tai nevyksta automatiškai.',
        'confirm' => 'Vis tiek atsieti',
    ],

    'tools' => [
        'title' => 'Discord įrankiai',
        'bot_unavailable' => 'Sukonfigūruokite boto žetoną papildinio nustatymuose, kad atrakintumėte DM siuntimą, atkūrimo slaptažodį arba 2FA atkūrimo kodus.',

        'dm' => [
            'button' => 'Siųsti DM',
            'title' => 'Siųsti Discord DM',
            'content_label' => 'Žinutė',
            'confirm' => 'Siųsti',
            'sent' => 'Žinutė išsiųsta.',
            'failed' => 'Nepavyko išsiųsti žinutės - botas ir šis naudotojas galbūt neturi bendro serverio, arba naudotojas išjungė DM.',
        ],

        'recovery_password' => [
            'button' => 'Siųsti atkūrimo slaptažodį',
            'title' => 'Siųsti atkūrimo slaptažodį',
            'warning' => 'Tai sugeneruoja naują atsitiktinį slaptažodį, priverčia jį pakeisti kito prisijungimo metu ir išsiunčia naudotojui per Discord DM.',
            'invalidate_sessions' => 'Taip pat atjungti visas šiuo metu atidarytas sesijas',
            'invalidate_sessions_help' => 'Atnaujina „prisiminti mane" žetoną, o jei svetainė naudoja duomenų bazės sesijų tvarkyklę, papildomai iškart išvalo naudotojo sesijas. Naudojant kitas sesijų tvarkykles, jau atidarytos sesijos gali likti prisijungusios, kol nepasibaigs pačios.',
            'confirm' => 'Siųsti',
            'sent' => 'Atkūrimo slaptažodis sugeneruotas ir išsiųstas.',
        ],

        'refresh' => [
            'button' => 'Atnaujinti Discord informaciją',
            'title' => 'Atnaujinti Discord informaciją',
            'description' => 'Iš Discord gaunamas dabartinis šio naudotojo Discord vartotojo vardas (ir avataras, jei įjungtas avataro sinchronizavimas), jei jis jį ten pakeitė.',
            'confirm' => 'Atnaujinti',
            'done' => 'Discord informacija atnaujinta.',
            'failed' => 'Nepavyko susisiekti su Discord, kad būtų atnaujinta šios paskyros informacija.',
        ],

        'recovery_codes' => [
            'button' => 'Siųsti 2FA atkūrimo kodus',
            'title' => 'Siųsti 2FA atkūrimo kodus',
            'warning' => 'Tai pakeičia esamus naudotojo dviejų faktorių atkūrimo kodus nauju rinkiniu ir juos išsiunčia per Discord DM. Seni kodai iškart nustoja veikti.',
            'confirm' => 'Siųsti',
            'sent' => 'Sugeneruoti ir išsiųsti nauji atkūrimo kodai.',
        ],
    ],

    'role_sync' => [
        'title' => 'Discord vaidmenų sinchronizavimas',
        'description' => 'Automatiškai suteikia Discord serverio vaidmenį naudotojams, atitinkantiems taisyklės sąlygas, ir jį panaikina, kai jie nebeatitinka (tikrinama realiuoju laiku esant svarbiems pokyčiams, taip pat pagal tvarkaraštį, kad būtų aptikti tokie atvejai kaip pasibaigusi prenumerata).',
        'bot_unavailable' => 'Sukonfigūruokite boto žetoną aukščiau esančiuose nustatymuose, kad atrakintumėte Discord vaidmenų sinchronizavimą.',
        'create' => 'Sukurti taisyklę',
        'edit' => 'Redaguoti taisyklę',
        'empty' => 'Kol kas nėra sinchronizavimo taisyklių.',
        'guild_id' => 'Serverio ID',
        'role_id' => 'Vaidmens ID',
        'conditions' => 'Sąlygos',
        'condition_site_roles' => 'Svetainės vaidmuo: :roles',
        'condition_shop_package' => 'Turi prekę: :package',
        'condition_balance' => 'Balansas tarp :min ir :max',
        'no_conditions' => 'Jokių (taikoma visiems)',
        'conditions_title' => 'Sąlygos',
        'conditions_help' => 'Kad ši taisyklė suteiktų savo vaidmenį, visos žemiau nustatytos sąlygos turi būti įvykdytos kartu. Palikite sąlygą tuščią/nepažymėtą, jei jos netikrinsite. Kelios taisyklės gali būti taikomos tam pačiam serverio vaidmeniui: pakanka atitikti vieną iš jų, kad jį gautumėte.',
        'condition_site_roles_label' => 'Riboti tik tam tikrais svetainės vaidmenimis',
        'condition_site_roles_help' => 'Palikite visus langelius nepažymėtus, jei šios sąlygos netikrinsite.',
        'condition_shop_package_label' => 'Reikalauja turėti šią parduotuvės prekę',
        'no_condition' => 'Netikrinti šios sąlygos',
        'balance_min' => 'Minimalus balansas',
        'balance_max' => 'Maksimalus balansas',
        'discord_role_title' => 'Suteikiamas Discord vaidmuo',
    ],

    'email_warning' => [
        'title' => 'Saugumo įspėjimas',
        'body' => 'Paskyrų susiejimas pagal el. pašto adresą yra mažiau saugus nei pagal Discord ID: bet kas, kas valdo patvirtintą el. pašto adresą Discord, galės prisijungti prie svetainės paskyros su tuo adresu, net jei susiejimas niekada nebuvo atliktas. Jei el. pašto paskyra pažeidžiama arba pakartotinai naudojama, tas pats galioja ir svetainės paskyrai. Įjunkite šią parinktį tik jei suprantate šią riziką.',
        'confirm' => 'Suprantu riziką',
    ],

    'info' => [
        'setup' => 'Šis papildinys pakartotinai naudoja Discord programėlę, sukonfigūruotą <a href=":url">Vaidmenų valdymas &rarr; Susieti vaidmenis su Discord</a> (client ID / client secret). Jei dar to nepadarėte, pirmiausia sukonfigūruokite ją ten.',
        'redirect_intro' => '<b>Discord kūrėjų portale</b>, skiltyje <b>OAuth2</b> &rarr; <b>Bendra</b>, papildomai pridėkite šiuos URL prie <b>Redirects</b> (be profilio susiejimo URL):',
    ],

    'test' => [
        'title' => 'Išbandyti konfigūraciją',
        'description' => 'Patikrinkite, ar client ID/secret galioja, tada atlikite tikrą bandomąjį prisijungimą, kad patvirtintumėte, jog peradresavimo URL iš tikrųjų yra užregistruoti Discord (tai vienintelis patikimas būdas patikrinti: Discord juos patvirtina tik autorizacijos ekrane, o ne anksčiau).',
        'credentials_button' => 'Patikrinti client ID / secret',
        'bot_token_button' => 'Patikrinti boto žetoną',
        'bot_token_ok' => 'Boto žetonas galioja.',
        'bot_token_invalid' => 'Boto žetono trūksta arba jis neteisingas.',
        'callback_button_login' => 'Išbandyti prisijungimo callback',
        'callback_button_confirm' => 'Išbandyti patvirtinimo callback',
        'callback_help' => 'Šie mygtukai iš tikrųjų nukreipia jus į Discord, naudodami du aukščiau nurodytus URL. Jei grįžtate į šį puslapį su sėkmės pranešimu, tai patvirtina, kad testuotas URL yra užregistruotas. Jei Discord rodo klaidą „invalid redirect_uri“ dar prieš prašydamas prisijungti, tas URL trūksta arba yra neteisingas.',
        'not_configured' => 'Nesukonfigūruotas joks Discord client ID / secret. Pirmiausia juos nustatykite vaidmenų valdyme.',
        'network_error' => 'Nepavyko pasiekti Discord API. Bandykite vėliau.',
        'credentials_invalid' => 'Client ID arba client secret yra neteisingi.',
        'credentials_ok' => 'Client ID ir client secret galioja.',
        'callback_failed' => 'Testas nepavyko. Patikrinkite, ar testuotas peradresavimo URL yra užregistruotas Discord ir ar client secret yra teisingas.',
        'callback_ok' => 'Testas sėkmingai atliktas kaip :name — šis peradresavimo URL teisingai užregistruotas Discord.',
    ],
];
