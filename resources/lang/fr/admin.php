<?php

return [
    'permission' => 'Gérer les paramètres de connexion Discord',
    'allow_duplicates' => 'Autoriser les doublons de liaison Discord',
    'allow_duplicates_help' => "Si activé, un même compte Discord peut être lié à plusieurs comptes du site ; à la connexion, l'utilisateur choisira à quel compte se connecter. Si désactivé, la liaison est refusée si ce Discord est déjà lié à un autre compte.",

    'info' => [
        'setup' => 'Ce plugin réutilise l\'application Discord configurée dans <a href=":url">Gestion des rôles &rarr; Lier les rôles avec Discord</a> (client ID / client secret). Configurez-la d\'abord là-bas si ce n\'est pas déjà fait.',
        'redirect_intro' => 'Dans le <b>portail développeur Discord</b>, onglet <b>OAuth2</b> &rarr; <b>Général</b>, ajoutez en plus ces URLs dans les <b>Redirections</b> (en plus de celle du lien de profil) :',
    ],
];
