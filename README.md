# Discord Login

Plugin [Azuriom](https://azuriom.com) qui ajoute la connexion et l'inscription via Discord, en réutilisant le système de liaison de compte Discord déjà intégré au core (celui utilisé par **Gestion des rôles → Lier les rôles avec Discord**) plutôt que d'en recréer un séparé.

## Fonctionnalités

- **Se connecter avec Discord** depuis `/login`, basé sur l'ID Discord (jamais l'email, pour éviter tout détournement de compte).
- **S'inscrire avec Discord** depuis `/register` : si aucun compte n'est encore lié, l'utilisateur arrive sur une page de finalisation où il peut personnaliser son pseudo (pré-rempli avec son pseudo Discord) et définir un mot de passe — facultatif.
- **Comptes sans mot de passe** : si l'utilisateur n'en définit pas à l'inscription, la connexion par mot de passe classique est explicitement désactivée pour ce compte (message clair, pas juste un mot de passe aléatoire invisible). Il peut en définir un plus tard depuis son profil.
- **Double authentification** : si le compte a la 2FA active, elle est demandée à chaque connexion Discord, sauf si l'utilisateur a coché "Autoriser la connexion Discord à contourner la 2FA" dans son profil.
- **Avertissement d'email différent** : si l'email du compte Discord ne correspond pas à celui du compte du site, un avertissement est affiché à la connexion — sans jamais bloquer l'accès.
- **Confirmation de mot de passe via Discord** : sur les pages qui demandent normalement de ressaisir son mot de passe (suppression de compte, activation 2FA...), un compte sans mot de passe peut confirmer son identité en se reconnectant à Discord à la place.
- **Doublons de liaison configurables** : par défaut, un compte Discord ne peut être lié qu'à un seul compte du site. Un réglage admin permet d'autoriser les liaisons multiples ; dans ce cas, la connexion Discord propose un écran de choix du compte.
- **Nettoyage automatique** : la suppression d'un compte retire aussi son lien Discord (rôle Discord et ligne de liaison), pour éviter qu'un compte supprimé reste accessible via Discord.

## Prérequis

- Une instance Azuriom avec une application Discord déjà configurée dans **Admin → Gestion des rôles** (`client_id` / `client_secret`). Ce plugin réutilise cette configuration, il n'a pas son propre écran de credentials Discord.

## Installation

1. Copier ce dépôt dans `plugins/discord-login` à la racine de votre installation Azuriom.
2. Activer le plugin depuis `/admin/plugins` (la migration ajoutant les colonnes nécessaires sur `discord_accounts` s'exécute automatiquement).
3. Dans le [portail développeur Discord](https://discord.com/developers/applications), sur l'application déjà utilisée pour la liaison de rôles, ajouter ces deux URLs de redirection supplémentaires (onglet **OAuth2 → Général**), en plus de celle déjà présente pour le lien de profil :
   - `https://votre-site/discord-login/callback`
   - `https://votre-site/discord-login/confirm/callback`

   Ces URLs exactes (adaptées à votre domaine) sont aussi rappelées directement sur `/admin/discord-login/settings`.

## Configuration

`/admin/discord-login/settings` — un seul réglage :

- **Autoriser les doublons de liaison Discord** (désactivé par défaut) : si activé, un même compte Discord peut être lié à plusieurs comptes du site.

## Licence

MIT — voir [LICENSE](LICENSE).
