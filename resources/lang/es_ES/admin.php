<?php

return [
    'permission' => 'Gestionar la configuración de inicio de sesión con Discord',
    'allow_duplicates' => 'Permitir vínculos duplicados de Discord',
    'allow_duplicates_help' => 'Si está activado, la misma cuenta de Discord puede vincularse a varias cuentas del sitio; al iniciar sesión, el usuario elegirá a qué cuenta acceder. Si está desactivado, se rechaza la vinculación si ese Discord ya está vinculado a otra cuenta.',
    'allow_passwordless' => 'Permitir la creación de cuentas sin contraseña',
    'allow_passwordless_help' => 'Si está activado, la contraseña es opcional al registrarse con Discord (la cuenta solo podrá iniciar sesión vía Discord hasta que se defina una contraseña desde el perfil). Si está desactivado, se requiere una contraseña para crear una cuenta con Discord.',
    'http_warning' => 'Este sitio se carga por HTTP (no seguro). Discord solo acepta URL de redirección HTTPS, excepto para localhost/127.0.0.1 en desarrollo local. Los callbacks fallarán hasta que el sitio se sirva por HTTPS.',
    'custom_credentials' => 'Usar credenciales de Discord dedicadas',
    'custom_credentials_help' => 'Si está activado, este plugin usará el client ID / secret de abajo en lugar de los configurados en la gestión de roles. Las URL de redirección indicadas arriba deberán entonces añadirse a esa aplicación de Discord dedicada.',
    'bot_token' => 'Token del bot',
    'bot_token_help' => 'El token de un bot de Discord invitado a tu(s) servidor(es) con los permisos "Gestionar roles" y "Crear invitación instantánea". Necesario para las herramientas de Discord del panel de administración, la sincronización de roles y la opción "Restringir a miembros de un servidor" de abajo — opcional en caso contrario.',
    'bot_token_shared_help' => 'Actualmente se reutiliza el token del bot ya configurado en la página Gestión de roles &rarr; Vincular roles con Discord. Activa "Usar credenciales de Discord dedicadas" arriba para usar un bot diferente.',
    'customizable_email' => 'Permitir un correo de registro personalizable',
    'customizable_email_help' => 'Si está activado, el usuario puede elegir una dirección de correo distinta a la de su cuenta de Discord al completar el registro, en lugar de quedar limitado al correo de Discord. No se puede activar junto con "Emparejar cuentas por dirección de correo electrónico".',
    'match_by_email' => 'Emparejar cuentas por dirección de correo electrónico',
    'match_by_email_help' => 'Si está activado, cuando ninguna cuenta esté vinculada a ese Discord, el inicio de sesión intentará encontrar una cuenta del sitio cuyo correo electrónico coincida con el correo (verificado) de Discord. Los vínculos explícitos siempre tienen prioridad.',
    'incompatible_with_match_by_email' => 'Esta opción no se puede activar al mismo tiempo que ":option".',
    'sync_avatar' => 'Sincronizar el avatar con Discord',
    'sync_avatar_help' => 'Si está activado, el avatar del sitio del usuario se establece según su avatar de Discord en cada inicio de sesión/registro, y cada vez que un administrador usa "Actualizar información de Discord" abajo.',
    'required_guild' => 'Restringir a miembros de un servidor',
    'required_guild_help' => 'Si se establece un ID de servidor, iniciar sesión o registrarse con Discord requiere ser miembro de ese servidor — el usuario es añadido automáticamente (Discord mismo solicita su consentimiento para el permiso "guilds.join" en la pantalla de autorización) si aún no es miembro. Requiere un token de bot arriba, invitado a ese servidor con el permiso "Crear invitación instantánea". Deja el ID de servidor vacío para desactivar esta restricción.',
    'required_guild_id' => 'ID del servidor',
    'bypass_maintenance' => 'Permitir el inicio de sesión con Discord durante el mantenimiento',
    'bypass_maintenance_help' => 'Si está activado, el inicio de sesión con Discord sigue siendo posible incluso mientras el modo de mantenimiento está activo, sin requerir el permiso de acceso al mantenimiento. Si está desactivado, sigue las mismas reglas que el inicio de sesión clásico.',

    'users' => [
        'no_password_warning' => 'Esta cuenta no tiene contraseña definida. Actualmente solo puede iniciar sesión a través de Discord. Definir una contraseña a continuación también habilitará el inicio de sesión clásico con contraseña.',
        'no_password_error' => 'Esta cuenta no tiene contraseña definida. Actualmente no puede iniciar sesión de ninguna manera. Definir una contraseña a continuación habilitará el inicio de sesión clásico con contraseña.',
    ],

    'force_unlink' => [
        'button' => 'Desvincular (bloquea la cuenta)',
        'title' => '¿Desvincular esta cuenta de Discord sin contraseña?',
        'warning' => 'Este vínculo de Discord es actualmente la única forma de iniciar sesión de esta cuenta. Desvincularlo bloqueará la cuenta hasta que se le defina una contraseña a continuación; esto no se hace automáticamente.',
        'confirm' => 'Desvincular de todos modos',
    ],

    'tools' => [
        'title' => 'Herramientas de Discord',
        'bot_unavailable' => 'Configura un token de bot en los ajustes del plugin para desbloquear el envío de un DM, una contraseña de recuperación, o códigos de recuperación 2FA.',

        'dm' => [
            'button' => 'Enviar un DM',
            'title' => 'Enviar un DM de Discord',
            'content_label' => 'Mensaje',
            'confirm' => 'Enviar',
            'sent' => 'El mensaje fue enviado.',
            'failed' => 'No se pudo enviar el mensaje — puede que el bot y este usuario no compartan ningún servidor, o que el usuario tenga los DM desactivados.',
        ],

        'recovery_password' => [
            'button' => 'Enviar una contraseña de recuperación',
            'title' => 'Enviar una contraseña de recuperación',
            'warning' => 'Esto genera una nueva contraseña aleatoria, obliga a cambiarla en el próximo inicio de sesión, y la envía al usuario por DM de Discord.',
            'invalidate_sessions' => 'También cerrar todas las sesiones actualmente abiertas',
            'invalidate_sessions_help' => 'Renueva el token "recordarme", y además borra inmediatamente las sesiones del usuario si el sitio usa el controlador de sesiones de base de datos. Con otros controladores de sesión, las sesiones ya abiertas pueden permanecer conectadas hasta que caduquen por sí solas.',
            'confirm' => 'Enviar',
            'sent' => 'La contraseña de recuperación fue generada y enviada.',
        ],

        'refresh' => [
            'button' => 'Actualizar información de Discord',
            'title' => 'Actualizar información de Discord',
            'description' => 'Obtiene el nombre de usuario actual de Discord de este usuario (y su avatar, si la sincronización de avatar está activada) desde Discord, por si lo cambió allí.',
            'confirm' => 'Actualizar',
            'done' => 'La información de Discord fue actualizada.',
            'failed' => 'No se pudo contactar con Discord para actualizar la información de esta cuenta.',
        ],

        'recovery_codes' => [
            'button' => 'Enviar códigos de recuperación 2FA',
            'title' => 'Enviar códigos de recuperación 2FA',
            'warning' => 'Esto reemplaza los códigos de recuperación de doble factor existentes del usuario por un nuevo conjunto, y los envía por DM de Discord. Los códigos antiguos dejan de funcionar de inmediato.',
            'confirm' => 'Enviar',
            'sent' => 'Se generaron y enviaron nuevos códigos de recuperación.',
        ],
    ],

    'role_sync' => [
        'title' => 'Sincronización de roles de Discord',
        'description' => 'Otorga automáticamente un rol de servidor de Discord a los usuarios que cumplen las condiciones de una regla, y lo retira en cuanto dejan de cumplirlas (verificado en tiempo real ante cambios relevantes, y en una programación para también detectar casos como una suscripción caducada).',
        'bot_unavailable' => 'Configura un token de bot en los ajustes de arriba para desbloquear la sincronización de roles de Discord.',
        'create' => 'Crear una regla',
        'edit' => 'Editar la regla',
        'empty' => 'Aún no hay reglas de sincronización.',
        'guild_id' => 'ID del servidor',
        'role_id' => 'ID del rol',
        'conditions' => 'Condiciones',
        'condition_site_roles' => 'Rol del sitio: :roles',
        'condition_shop_package' => 'Posee el artículo: :package',
        'condition_balance' => 'Saldo entre :min y :max',
        'no_conditions' => 'Ninguna (aplica a todos)',
        'conditions_title' => 'Condiciones',
        'conditions_help' => 'Todas las condiciones definidas a continuación deben cumplirse juntas para que esta regla otorgue su rol. Deja una condición vacía/sin seleccionar para no verificarla. Varias reglas pueden apuntar al mismo rol de servidor: basta con cumplir una de ellas para obtenerlo.',
        'condition_site_roles_label' => 'Restringir a ciertos roles del sitio',
        'condition_site_roles_help' => 'Deja todas las casillas sin marcar para no verificar esta condición.',
        'condition_shop_package_label' => 'Requiere poseer este artículo de la tienda',
        'no_condition' => 'No verificar esta condición',
        'balance_min' => 'Saldo mínimo',
        'balance_max' => 'Saldo máximo',
        'discord_role_title' => 'Rol de Discord a otorgar',
    ],

    'email_warning' => [
        'title' => 'Advertencia de seguridad',
        'body' => 'Emparejar cuentas por dirección de correo electrónico es menos seguro que por ID de Discord: cualquiera que controle una dirección de correo verificada en Discord podrá iniciar sesión en la cuenta del sitio con esa dirección, sin que jamás se haya realizado ninguna vinculación. Si una cuenta de correo se ve comprometida o reutilizada, también lo estará la cuenta del sitio. Activa esta opción solo si comprendes este riesgo.',
        'confirm' => 'Entiendo el riesgo',
    ],

    'info' => [
        'setup' => 'Este plugin reutiliza la aplicación de Discord configurada en <a href=":url">Gestión de roles &rarr; Vincular roles con Discord</a> (client ID / client secret). Configúrala allí primero si aún no lo has hecho.',
        'redirect_intro' => 'En el <b>portal de desarrolladores de Discord</b>, en <b>OAuth2</b> &rarr; <b>General</b>, añade además estas URL a los <b>Redirects</b> (además de la del vínculo de perfil):',
    ],

    'test' => [
        'title' => 'Probar la configuración',
        'description' => 'Comprueba que el client ID/secret sean válidos, y luego ejecuta un inicio de sesión de prueba real para confirmar que las URL de redirección están realmente registradas en Discord (es la única forma fiable de comprobarlo: Discord solo las valida en la pantalla de autorización, no antes).',
        'credentials_button' => 'Comprobar client ID / secret',
        'bot_token_button' => 'Comprobar token del bot',
        'bot_token_ok' => 'El token del bot es válido.',
        'bot_token_invalid' => 'El token del bot falta o es incorrecto.',
        'callback_button_login' => 'Probar el callback de inicio de sesión',
        'callback_button_confirm' => 'Probar el callback de confirmación',
        'callback_help' => 'Estos botones te redirigen realmente a Discord, usando las dos URL indicadas arriba. Si vuelves a esta página con un mensaje de éxito, eso confirma que la URL probada está registrada. Si Discord muestra un error de "redirect_uri no válida" incluso antes de pedirte iniciar sesión, esa URL falta o es incorrecta.',
        'not_configured' => 'No hay ningún client ID / secret de Discord configurado. Configúralos primero en la gestión de roles.',
        'network_error' => 'No se pudo conectar con la API de Discord. Inténtalo de nuevo más tarde.',
        'credentials_invalid' => 'El client ID o el client secret son incorrectos.',
        'credentials_ok' => 'El client ID y el client secret son válidos.',
        'callback_failed' => 'La prueba falló. Comprueba que la URL de redirección probada esté registrada en Discord y que el client secret sea correcto.',
        'callback_ok' => 'Prueba superada como :name — esa URL de redirección está correctamente registrada en Discord.',
    ],
];
