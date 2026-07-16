<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'Ši Discord paskyra jau susieta su kita paskyra.',
    'email_mismatch' => 'Prisijungimas sėkmingas. Įspėjimas: jūsų Discord paskyros el. pašto adresas nesutampa su jūsų paskyros el. paštu.',
    'password_login_disabled' => 'Šiai paskyrai nenustatytas slaptažodis: prisijunkite per Discord.',
    'guild_required' => 'Prieš prisijungdami ar registruodamiesi su Discord, turite prisijungti prie mūsų Discord serverio.',
    'guild_notice' => 'Norėdami susieti paskyrą, turėsite prisijungti prie mūsų Discord serverio.',

    'login' => [
        'button' => 'Prisijungti su Discord',
    ],

    'register' => [
        'button' => 'Registruotis su Discord',
        'title' => 'Užbaikite registraciją',
        'not_found' => 'Su šiuo Discord dar nesusieta jokia paskyra. Užpildykite žemiau esančią informaciją, kad sukurtumėte paskyrą.',
        'duplicate_notice' => 'Ši Discord paskyra jau susieta su kita paskyra, tačiau vis tiek nusprendėte sukurti naują. Užpildykite žemiau esančią informaciją.',
        'email_help' => 'Jūsų Discord paskyros el. paštas, naudojamas jūsų paskyrai.',
        'password_optional' => 'Slaptažodis (neprivalomas)',
        'password_help' => 'Jei nenustatysite slaptažodžio, galėsite prisijungti tik per Discord (vėliau galėsite jį nustatyti savo profilyje).',
        'submit' => 'Sukurti paskyrą',
        'email_used' => 'Šis el. pašto adresas jau naudojamas kitos paskyros.',
    ],

    'choose' => [
        'title' => 'Su šiuo Discord susieta kelios paskyros',
        'description' => 'Pasirinkite, į kurią paskyrą norite prisijungti.',
    ],

    'conflict' => [
        'title' => 'Šis Discord jau susietas',
        'already_linked' => 'Ši Discord paskyra jau susieta su esama paskyra šioje svetainėje. Galite prisijungti prie tos paskyros arba, jei leidžiami dublikatai, sukurti naują.',
        'login' => 'Prisijungti prie esamos paskyros',
        'register' => 'Vis tiek sukurti naują paskyrą',
    ],

    'confirm' => [
        'description' => 'Jūsų paskyra neturi slaptažodžio: patvirtinkite savo tapatybę iš naujo prisijungdami prie Discord.',
        'button' => 'Patvirtinti su Discord',
        'mismatch' => 'Tai nėra su jūsų profiliu susieta Discord paskyra.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Discord prisijungimas susietas su :name.',
        'bypass_2fa' => 'Leisti Discord prisijungimui apeiti dviejų faktorių autentifikaciją',
        'no_password' => 'Jūsų paskyra neturi nustatyto slaptažodžio. Čia galite jį sukurti, kad galėtumėte prisijungti ir be Discord.',
        'set_password' => 'Nustatyti slaptažodį',
        'unlink_locked' => 'Prieš atsiedami Discord paskyrą, pirmiausia turite nustatyti slaptažodį, kitaip nebegalėsite prisijungti prie savo paskyros.',
    ],

    'tools' => [
        'recovery_dm' => "Sveiki! :site administratorius sugeneravo naują jūsų paskyros slaptažodį:\n\n:password\n\nKitą kartą prisijungę su juo, būsite paprašyti jį pakeisti.",
        'recovery_codes_dm' => "Sveiki! :site administratorius sugeneravo naujus jūsų dviejų faktorių autentifikacijos atkūrimo kodus. Ankstesni kodai nebeveikia. Štai jūsų nauji kodai - saugokite juos saugioje vietoje:\n\n:codes",
    ],
];
