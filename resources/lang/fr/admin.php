<?php

return [
    'permission' => 'Gérer les paramètres de connexion Discord',
    'allow_duplicates' => 'Autoriser les doublons de liaison Discord',
    'allow_duplicates_help' => "Si activé, un même compte Discord peut être lié à plusieurs comptes du site ; à la connexion, l'utilisateur choisira à quel compte se connecter. Si désactivé, la liaison est refusée si ce Discord est déjà lié à un autre compte.",
    'allow_passwordless' => 'Autoriser la création de comptes sans mot de passe',
    'allow_passwordless_help' => "Si activé, le mot de passe est facultatif lors de l'inscription via Discord (le compte ne pourra alors se connecter que via Discord, jusqu'à ce qu'un mot de passe soit défini depuis le profil). Si désactivé, un mot de passe est obligatoire pour créer un compte via Discord.",
    'http_warning' => "Ce site est chargé en HTTP (non sécurisé). Discord n'accepte que des URLs de redirection en HTTPS, à l'exception de localhost/127.0.0.1 pour le développement local. Les callbacks échoueront tant que le site n'est pas servi en HTTPS.",

    'info' => [
        'setup' => 'Ce plugin réutilise l\'application Discord configurée dans <a href=":url">Gestion des rôles &rarr; Lier les rôles avec Discord</a> (client ID / client secret). Configurez-la d\'abord là-bas si ce n\'est pas déjà fait.',
        'redirect_intro' => 'Dans le <b>portail développeur Discord</b>, onglet <b>OAuth2</b> &rarr; <b>Général</b>, ajoutez en plus ces URLs dans les <b>Redirections</b> (en plus de celle du lien de profil) :',
    ],

    'test' => [
        'title' => 'Tester la configuration',
        'description' => "Vérifiez que le client ID/secret sont valides, puis effectuez une vraie connexion de test pour confirmer que les URLs de redirection sont bien enregistrées sur Discord (c'est le seul moyen fiable de le vérifier : Discord ne le valide qu'au moment de l'écran d'autorisation, pas avant).",
        'credentials_button' => 'Vérifier le client ID / secret',
        'callback_button_login' => 'Tester le callback de connexion',
        'callback_button_confirm' => 'Tester le callback de confirmation',
        'callback_help' => "Ces boutons vous redirigent réellement vers Discord, en utilisant les deux URLs listées ci-dessus. Si vous revenez sur cette page avec un message de succès, cela confirme que l'URL testée est bien enregistrée. Si Discord affiche une erreur \"redirect_uri invalide\" avant même de vous demander de vous connecter, l'URL n'est pas (ou mal) enregistrée.",
        'not_configured' => "Aucun client ID / secret Discord n'est configuré. Renseignez-les d'abord dans Gestion des rôles.",
        'network_error' => "Impossible de contacter l'API Discord. Réessayez plus tard.",
        'credentials_invalid' => 'Le client ID ou le client secret est incorrect.',
        'credentials_ok' => 'Le client ID et le client secret sont valides.',
        'callback_failed' => "Échec du test. Vérifiez que l'URL de redirection testée est bien enregistrée sur Discord et que le client secret est correct.",
        'callback_ok' => 'Test réussi avec :name — cette URL de redirection est bien enregistrée sur Discord.',
    ],
];
