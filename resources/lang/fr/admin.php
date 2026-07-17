<?php

return [
    'nav' => [
        'configuration' => 'Configuration',
        'authentication' => 'Authentification',
        'roles' => 'Rôles',
    ],

    'permission' => 'Gérer les paramètres de connexion Discord',
    'enabled' => "Activer l'authentification Discord",
    'enabled_help' => "Si désactivé, les boutons « Se connecter avec Discord » / « S'inscrire avec Discord » sont masqués et les routes correspondantes refusent de terminer une connexion ou une inscription, sans toucher aux identifiants configurés ci-dessous.",
    'allow_duplicates' => 'Autoriser les doublons de liaison Discord',
    'allow_duplicates_help' => "Si activé, un même compte Discord peut être lié à plusieurs comptes du site ; à la connexion, l'utilisateur choisira à quel compte se connecter. Si désactivé, la liaison est refusée si ce Discord est déjà lié à un autre compte.",
    'allow_passwordless' => 'Autoriser la création de comptes sans mot de passe',
    'allow_passwordless_help' => "Si activé, le mot de passe est facultatif lors de l'inscription via Discord (le compte ne pourra alors se connecter que via Discord, jusqu'à ce qu'un mot de passe soit défini depuis le profil). Si désactivé, un mot de passe est obligatoire pour créer un compte via Discord.",
    'http_warning' => "Ce site est chargé en HTTP (non sécurisé). Discord n'accepte que des URLs de redirection en HTTPS, à l'exception de localhost/127.0.0.1 pour le développement local. Les callbacks échoueront tant que le site n'est pas servi en HTTPS.",
    'custom_credentials' => 'Utiliser des identifiants Discord dédiés',
    'custom_credentials_help' => "Si activé, ce plugin utilisera le client ID / secret ci-dessous au lieu de ceux configurés dans Gestion des rôles. Les URLs de redirection listées plus haut devront alors être ajoutées sur cette application Discord dédiée.",
    'bot_token' => 'Token du bot',
    'bot_token_help' => "Le token d'un bot Discord invité sur votre/vos serveur(s) avec les permissions « Gérer les rôles » et « Créer une invitation instantanée ». Nécessaire pour les outils Discord admin, la synchronisation de rôles et l'option « Limiter aux membres d'un serveur » ci-dessous — facultatif sinon.",
    'bot_token_shared_help' => "Réutilise actuellement le token du bot déjà configuré sur la page Gestion des rôles &rarr; Lier les rôles avec Discord. Activez « Utiliser des identifiants Discord dédiés » ci-dessus pour utiliser un autre bot.",
    'customizable_email' => "Autoriser un e-mail d'inscription personnalisable",
    'customizable_email_help' => "Si activé, l'utilisateur peut choisir une adresse e-mail différente de celle de son compte Discord lors de la finalisation de l'inscription, au lieu d'être limité à l'e-mail Discord. Ne peut pas être activé en même temps que « Faire correspondre les comptes par adresse e-mail ».",
    'match_by_email' => "Faire correspondre les comptes par adresse e-mail",
    'match_by_email_help' => "Si activé, lorsqu'aucun compte n'est lié à ce Discord, la connexion tentera de retrouver un compte du site dont l'adresse e-mail correspond à celle (vérifiée) du compte Discord. Les liaisons explicites restent prioritaires.",
    'incompatible_with_match_by_email' => "Ce paramètre ne peut pas être activé en même temps que « :option ».",
    'sync_avatar' => "Synchroniser l'avatar avec Discord",
    'sync_avatar_help' => "Si activé, l'avatar du site de l'utilisateur est réglé sur son avatar Discord à chaque connexion/inscription, et à chaque utilisation de « Actualiser les infos Discord » par un admin ci-dessous.",
    'required_guild' => "Limiter aux membres d'un serveur",
    'required_guild_help' => "Si un ID de serveur est renseigné, se connecter ou s'inscrire avec Discord nécessite d'être membre de ce serveur — l'utilisateur y est automatiquement ajouté (son consentement à la permission « guilds.join » est demandé par Discord lui-même, sur l'écran d'autorisation) s'il n'en est pas déjà membre. Nécessite un token de bot ci-dessus, invité sur ce serveur avec la permission « Créer une invitation instantanée ». Laissez l'ID de serveur vide pour désactiver cette restriction.",
    'required_guild_id' => 'ID du serveur',
    'no_required_guild' => 'Aucune restriction',
    'unknown_guild' => 'Serveur inconnu (:id)',
    'bypass_maintenance' => 'Autoriser la connexion Discord pendant les maintenances',
    'bypass_maintenance_help' => "Si activé, la connexion via Discord reste possible même lorsque le mode maintenance est actif, sans nécessiter la permission d'accès à la maintenance. Si désactivé, elle suit les mêmes règles que la connexion classique.",

    'users' => [
        'no_password_warning' => "Ce compte n'a pas de mot de passe défini. Il ne peut actuellement se connecter que via Discord. Définir un mot de passe ci-dessous activera également la connexion classique par mot de passe.",
        'no_password_error' => "Ce compte n'a pas de mot de passe défini. Il ne peut actuellement pas se connecter. Définir un mot de passe ci-dessous activera la connexion classique par mot de passe.",
    ],

    'force_unlink' => [
        'button' => 'Délier (verrouille le compte)',
        'title' => 'Délier ce compte Discord sans mot de passe ?',
        'warning' => "Ce lien Discord est actuellement le seul moyen de connexion de ce compte. Le délier verrouillera le compte tant qu'un mot de passe ne lui sera pas défini ci-dessous — cela ne se fait pas automatiquement.",
        'confirm' => 'Délier quand même',
    ],

    'tools' => [
        'title' => 'Outils Discord',
        'bot_unavailable' => "Configurez un token de bot dans les réglages du plugin pour débloquer l'envoi d'un MP, d'un mot de passe de récupération, ou de codes de secours 2FA.",

        'dm' => [
            'button' => 'Envoyer un MP',
            'title' => 'Envoyer un MP Discord',
            'content_label' => 'Message',
            'confirm' => 'Envoyer',
            'sent' => 'Le message a été envoyé.',
            'failed' => "Impossible d'envoyer le message — le bot et cet utilisateur ne partagent peut-être aucun serveur, ou l'utilisateur a peut-être désactivé ses MP.",
        ],

        'recovery_password' => [
            'button' => 'Envoyer un mot de passe de récupération',
            'title' => 'Envoyer un mot de passe de récupération',
            'warning' => 'Génère un nouveau mot de passe aléatoire, force son changement à la prochaine connexion, et l\'envoie à l\'utilisateur par MP Discord.',
            'invalidate_sessions' => 'Déconnecter aussi toutes les sessions actuellement ouvertes',
            'invalidate_sessions_help' => "Renouvelle le jeton « se souvenir de moi », et vide en plus immédiatement les sessions de l'utilisateur si le site utilise le pilote de session base de données. Avec d'autres pilotes de session, les sessions déjà ouvertes peuvent rester connectées jusqu'à leur expiration naturelle.",
            'confirm' => 'Envoyer',
            'sent' => 'Le mot de passe de récupération a été généré et envoyé.',
        ],

        'refresh' => [
            'button' => 'Actualiser les infos Discord',
            'title' => 'Actualiser les infos Discord',
            'description' => "Récupère le pseudo Discord actuel de cet utilisateur (et son avatar, si la synchronisation d'avatar est activée) depuis Discord, au cas où il l'aurait changé là-bas.",
            'confirm' => 'Actualiser',
            'done' => 'Les infos Discord ont été actualisées.',
            'failed' => 'Impossible de contacter Discord pour actualiser les infos de ce compte.',
        ],

        'recovery_codes' => [
            'button' => 'Envoyer les codes de secours 2FA',
            'title' => 'Envoyer les codes de secours 2FA',
            'warning' => "Remplace les codes de secours à deux facteurs existants de l'utilisateur par un nouveau jeu, et les envoie par MP Discord. Les anciens codes cessent immédiatement de fonctionner.",
            'confirm' => 'Envoyer',
            'sent' => 'De nouveaux codes de secours ont été générés et envoyés.',
        ],
    ],

    'role_sync' => [
        'title' => 'Synchronisation de rôles Discord',
        'description' => "Attribue automatiquement un rôle de serveur Discord aux utilisateurs correspondant aux conditions d'une règle, et le retire dès qu'ils n'y correspondent plus (vérifié en temps réel lors des changements pertinents, et sur une planification pour aussi rattraper des cas comme un abonnement expiré).",
        'bot_unavailable' => 'Configurez un token de bot dans les réglages ci-dessus pour débloquer la synchronisation de rôles Discord.',
        'create' => 'Créer une règle',
        'edit' => 'Modifier la règle',
        'empty' => 'Aucune règle de synchronisation pour le moment.',
        'guild_id' => 'ID du serveur',
        'role_id' => 'ID du rôle',
        'conditions' => 'Conditions',
        'condition_site_roles' => 'Rôle du site : :roles',
        'condition_shop_package' => "Possède l'article : :package",
        'condition_balance' => 'Solde entre :min et :max',
        'no_conditions' => "Aucune (s'applique à tout le monde)",
        'conditions_title' => 'Conditions',
        'conditions_help' => "Toutes les conditions renseignées ci-dessous doivent être remplies ensemble pour que cette règle attribue son rôle. Laissez une condition vide/non sélectionnée pour ne pas la vérifier. Plusieurs règles peuvent cibler le même rôle de serveur : correspondre à l'une d'elles suffit pour l'obtenir.",
        'condition_site_roles_label' => 'Limiter à certains rôles du site',
        'condition_site_roles_help' => 'Laissez toutes les cases décochées pour ne pas vérifier cette condition.',
        'condition_shop_package_label' => 'Nécessite de posséder cet article du shop',
        'no_condition' => 'Ne pas vérifier cette condition',
        'balance_min' => 'Solde minimum',
        'balance_max' => 'Solde maximum',
        'discord_role_title' => 'Rôle Discord à attribuer',
    ],

    'email_warning' => [
        'title' => 'Avertissement de sécurité',
        'body' => "Faire correspondre les comptes par adresse e-mail est moins sûr que par identifiant Discord : quiconque contrôle une adresse e-mail vérifiée sur Discord pourra se connecter au compte du site portant cette adresse, sans qu'aucune liaison n'ait jamais été faite. Si un compte e-mail est compromis ou réutilisé, le compte du site l'est aussi. N'activez cette option que si vous comprenez ce risque.",
        'confirm' => 'Je comprends le risque',
    ],

    'info' => [
        'setup' => 'Ce plugin réutilise l\'application Discord configurée dans <a href=":url">Gestion des rôles &rarr; Lier les rôles avec Discord</a> (client ID / client secret). Configurez-la d\'abord là-bas si ce n\'est pas déjà fait.',
        'redirect_intro' => 'Dans le <b>portail développeur Discord</b>, onglet <b>OAuth2</b> &rarr; <b>Général</b>, ajoutez en plus cette URL dans les <b>Redirections</b> (en plus de celle du lien de profil) :',
    ],

    'test' => [
        'title' => 'Tester la configuration',
        'description' => "Vérifiez que le client ID/secret sont valides, puis effectuez une vraie connexion de test pour confirmer que les URLs de redirection sont bien enregistrées sur Discord (c'est le seul moyen fiable de le vérifier : Discord ne le valide qu'au moment de l'écran d'autorisation, pas avant).",
        'credentials_button' => 'Vérifier le client ID / secret',
        'bot_token_button' => 'Vérifier le token du bot',
        'bot_token_ok' => 'Le token du bot est valide.',
        'bot_token_invalid' => 'Le token du bot est manquant ou incorrect.',
        'callback_button' => 'Tester le callback',
        'callback_help' => "Ce bouton vous redirige réellement vers Discord, en utilisant l'URL listée ci-dessus. Si vous revenez sur cette page avec un message de succès, cela confirme que l'URL est bien enregistrée. Si Discord affiche une erreur \"redirect_uri invalide\" avant même de vous demander de vous connecter, l'URL n'est pas (ou mal) enregistrée.",
        'not_configured' => "Aucun client ID / secret Discord n'est configuré. Renseignez-les d'abord dans Gestion des rôles.",
        'network_error' => "Impossible de contacter l'API Discord. Réessayez plus tard.",
        'credentials_invalid' => 'Le client ID ou le client secret est incorrect.',
        'credentials_ok' => 'Le client ID et le client secret sont valides.',
        'callback_failed' => "Échec du test. Vérifiez que l'URL de redirection testée est bien enregistrée sur Discord et que le client secret est correct.",
        'callback_ok' => 'Test réussi avec :name — cette URL de redirection est bien enregistrée sur Discord.',
    ],
];
