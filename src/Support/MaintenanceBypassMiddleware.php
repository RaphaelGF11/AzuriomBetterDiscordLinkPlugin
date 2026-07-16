<?php

namespace Azuriom\Plugin\DiscordLogin\Support;

use Azuriom\Http\Middleware\CheckForMaintenanceSettings;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * The core's CheckForMaintenanceSettings middleware runs globally and blocks
 * every route by default during maintenance, including this plugin's guest
 * routes (redirect/callback/register/...) - so the "bypass maintenance"
 * setting has to act here, before those requests ever reach the controller,
 * not inside it.
 */
class MaintenanceBypassMiddleware extends CheckForMaintenanceSettings
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->routeIs('discord-login.*') && setting('discord-login.bypass_maintenance', true)) {
            return $next($request);
        }

        return parent::handle($request, $next);
    }
}
