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
- **Customizable registration email**: optionally let the user pick a different email than their Discord one while completing registration, instead of being locked to it.
- **Match accounts by email** (opt-in, off by default): fall back to matching by verified Discord email when no explicit link exists — flagged with an explicit security warning in the admin UI, since it's inherently weaker than ID-based matching.
- **Avatar sync**: optionally keep the site avatar in sync with the user's Discord avatar.
- **Restrict to server members**: optionally require being a member of a specific Discord server to log in or register, automatically adding the user to it (with their consent, via Discord's own authorization screen) if they aren't already a member.
- **Admin Discord tools** on a user's edit page (when linked): send a DM, send a one-off recovery password (forces a password change at next login, optional session invalidation), refresh the cached Discord username/avatar, and send fresh 2FA recovery codes — each gated by a captcha and a confirmation delay to prevent abuse.
- **Automatic Discord role sync**: define rules (site role / shop package ownership / balance range, combinable) that automatically grant a Discord server role, kept in sync both in real time and on a schedule.
- **Maintenance mode bypass** (enabled by default): Discord login keeps working during maintenance, without needing the maintenance access permission.
- **Automatic cleanup**: deleting an account also removes its Discord link (Discord role and link row), so a deleted account can't remain reachable via Discord.
- Available in 19 languages.

## Requirements

- An Azuriom instance with a Discord application already configured under **Admin → Roles management** (`client_id` / `client_secret`). This plugin reuses that configuration by default; dedicated credentials (and a dedicated bot token) can be configured instead if needed.
- A Discord bot token (optional) is required to unlock the admin Discord tools, role sync, and the "restrict to server members" option. By default this reuses the bot token already configured for **Roles management** — a dedicated one can be set instead.

## Installation

1. Copy this repository into `plugins/discord-login` at the root of your Azuriom installation.
2. Enable the plugin from `/admin/plugins` (the required migrations run automatically).
3. In the [Discord developer portal](https://discord.com/developers/applications), on the application already used for role linking, add these two extra redirect URLs (**OAuth2 → General** tab), on top of the one already there for the profile link:
   - `https://your-site/discord-login/callback`
   - `https://your-site/discord-login/confirm/callback`

   These exact URLs (for your domain) are also shown directly on `/admin/discord-login/settings`.
4. If you plan to use the admin Discord tools, role sync, or server-restriction features, invite a Discord bot to your server(s) with the **Manage Roles** and **Create Instant Invite** permissions, and set its token in the plugin settings (or reuse the one already configured for Roles management).

## Configuration

Everything is managed from `/admin/discord-login/settings`, including a full Discord role sync rule editor. Highlights:

- **Allow duplicate Discord links** (disabled by default): if enabled, the same Discord account can be linked to several site accounts.
- **Allow passwordless account creation** (enabled by default).
- **Use dedicated Discord credentials** (disabled by default): use a separate client ID/secret/bot token instead of the ones shared with Roles management.
- **Allow a customizable registration email** / **Match accounts by email address** (both disabled by default, mutually exclusive with each other and with duplicate links).
- **Sync avatar with Discord** (disabled by default).
- **Restrict to members of a server** (disabled by default): set a server ID to enable it.
- **Allow Discord login during maintenance** (enabled by default).

## Known limitation

If the site's configured game already uses OAuth login (e.g. Steam or Minecraft SSO, `oauth_login()` enabled), the classic `/login` and `/register` pages are never reached — the core redirects to that OAuth provider automatically — so the Discord buttons won't be visible in that setup.

## License

MIT — see [LICENSE](LICENSE).
