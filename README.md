# Discord Login

An [Azuriom](https://azuriom.com) plugin that adds login and registration via Discord, reusing the Discord account-linking system already built into the core (the one used by **Roles management → Link roles with Discord**) instead of building a separate one.

## Features

- **Log in with Discord** from `/login`, based on the Discord ID (never the email, to avoid any account takeover risk).
- **Sign up with Discord** from `/register`: if no account is linked yet, the user lands on a completion page where they can customize their username (pre-filled with their Discord username) and set a password — optional.
- **Passwordless accounts**: if the user doesn't set one at registration, classic password login is explicitly disabled for that account (a clear message is shown, not just a hidden random password). A password can be set later from the profile page.
- **Two-factor authentication**: if the account has 2FA enabled, it is required on every Discord login, unless the user checked "Allow Discord login to bypass 2FA" in their profile.
- **Email mismatch warning**: if the Discord account's email differs from the site account's email, a warning is shown at login — access is never blocked because of it.
- **Password confirmation via Discord**: on pages that normally ask to re-enter your password (account deletion, enabling 2FA...), an account with no password can confirm its identity by logging back into Discord instead.
- **Configurable duplicate links**: by default, a Discord account can only be linked to one site account. An admin setting allows multiple links; in that case, Discord login shows an account picker.
- **Automatic cleanup**: deleting an account also removes its Discord link (Discord role and link row), so a deleted account can't remain reachable via Discord.

## Requirements

- An Azuriom instance with a Discord application already configured under **Admin → Roles management** (`client_id` / `client_secret`). This plugin reuses that configuration; it has no Discord credentials screen of its own.

## Installation

1. Copy this repository into `plugins/discord-login` at the root of your Azuriom installation.
2. Enable the plugin from `/admin/plugins` (the migration adding the required columns to `discord_accounts` runs automatically).
3. In the [Discord developer portal](https://discord.com/developers/applications), on the application already used for role linking, add these two extra redirect URLs (**OAuth2 → General** tab), on top of the one already there for the profile link:
   - `https://your-site/discord-login/callback`
   - `https://your-site/discord-login/confirm/callback`

   These exact URLs (for your domain) are also shown directly on `/admin/discord-login/settings`.

## Configuration

`/admin/discord-login/settings` — a single setting:

- **Allow duplicate Discord links** (disabled by default): if enabled, the same Discord account can be linked to several site accounts.

## Known limitation

If the site's configured game already uses OAuth login (e.g. Steam or Minecraft SSO, `oauth_login()` enabled), the classic `/login` and `/register` pages are never reached — the core redirects to that OAuth provider automatically — so the Discord buttons won't be visible in that setup.

## License

MIT — see [LICENSE](LICENSE).
