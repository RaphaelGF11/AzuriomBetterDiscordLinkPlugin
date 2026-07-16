<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'Esta cuenta de Discord ya está vinculada a otra cuenta.',
    'email_mismatch' => 'Inicio de sesión correcto. Aviso: el correo electrónico de tu cuenta de Discord no coincide con el de tu cuenta.',
    'password_login_disabled' => 'Esta cuenta no tiene contraseña: inicia sesión con Discord en su lugar.',
    'guild_required' => 'Debes unirte a nuestro servidor de Discord antes de poder iniciar sesión o registrarte con Discord.',
    'guild_notice' => 'Deberás unirte a nuestro servidor de Discord para vincular tu cuenta.',

    'login' => [
        'button' => 'Iniciar sesión con Discord',
    ],

    'register' => [
        'button' => 'Registrarse con Discord',
        'title' => 'Completa tu registro',
        'not_found' => 'Todavía no hay ninguna cuenta vinculada a este Discord. Completa la siguiente información para crear tu cuenta.',
        'duplicate_notice' => 'Esta cuenta de Discord ya está vinculada a otra cuenta, pero decidiste crear una nueva de todos modos. Completa la siguiente información.',
        'email_help' => 'El correo electrónico de tu cuenta de Discord, utilizado para tu cuenta.',
        'password_optional' => 'Contraseña (opcional)',
        'password_help' => 'Si no defines una contraseña, solo podrás iniciar sesión a través de Discord (puedes definir una más tarde desde tu perfil).',
        'submit' => 'Crear mi cuenta',
        'email_used' => 'Esta dirección de correo ya está siendo utilizada por otra cuenta.',
    ],

    'choose' => [
        'title' => 'Varias cuentas están vinculadas a este Discord',
        'description' => 'Elige a qué cuenta quieres iniciar sesión.',
    ],

    'conflict' => [
        'title' => 'Este Discord ya está vinculado',
        'already_linked' => 'Esta cuenta de Discord ya está vinculada a una cuenta existente en el sitio. Puedes iniciar sesión en esa cuenta, o crear una nueva si los duplicados están permitidos.',
        'login' => 'Iniciar sesión en la cuenta existente',
        'register' => 'Crear una cuenta nueva de todos modos',
    ],

    'confirm' => [
        'description' => 'Tu cuenta no tiene contraseña: confirma tu identidad volviendo a iniciar sesión en Discord.',
        'button' => 'Confirmar con Discord',
        'mismatch' => 'Esta no es la cuenta de Discord vinculada a tu perfil.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Inicio de sesión con Discord vinculado a :name.',
        'bypass_2fa' => 'Permitir que el inicio de sesión con Discord omita la autenticación de dos factores',
        'no_password' => 'Tu cuenta no tiene contraseña definida. Puedes crear una aquí para también poder iniciar sesión sin Discord.',
        'set_password' => 'Definir una contraseña',
        'unlink_locked' => 'Debes definir una contraseña antes de desvincular tu cuenta de Discord, de lo contrario ya no podrías iniciar sesión en tu cuenta.',
    ],

    'tools' => [
        'recovery_dm' => "¡Hola! Un administrador de :site generó una nueva contraseña para tu cuenta:\n\n:password\n\nSe te pedirá cambiarla la próxima vez que inicies sesión con ella.",
        'recovery_codes_dm' => "¡Hola! Un administrador de :site regeneró tus códigos de recuperación de autenticación de dos factores. Tus códigos anteriores ya no funcionan. Aquí tienes tus nuevos códigos — guárdalos en un lugar seguro:\n\n:codes",
    ],
];
