<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => '此 Discord 账号已绑定到另一个账号。',
    'email_mismatch' => '登录成功。警告：您的 Discord 账号邮箱与您账号的邮箱不一致。',
    'password_login_disabled' => '此账号未设置密码：请改用 Discord 登录。',
    'guild_required' => '您需要先加入我们的 Discord 服务器，才能使用 Discord 登录或注册。',
    'guild_notice' => '您需要加入我们的 Discord 服务器才能绑定您的账号。',

    'login' => [
        'button' => '使用 Discord 登录',
    ],

    'register' => [
        'button' => '使用 Discord 注册',
        'title' => '完成注册',
        'not_found' => '此 Discord 尚未绑定任何账号。请填写以下信息以创建您的账号。',
        'duplicate_notice' => '此 Discord 账号已绑定到另一个账号，但您选择仍然创建一个新账号。请填写以下信息。',
        'email_help' => '您的 Discord 账号邮箱，将用于您的账号。',
        'password_optional' => '密码（可选）',
        'password_help' => '如果不设置密码，您将只能通过 Discord 登录（稍后可在个人资料中设置密码）。',
        'submit' => '创建我的账号',
        'email_used' => '此邮箱地址已被另一个账号使用。',
    ],

    'choose' => [
        'title' => '此 Discord 绑定了多个账号',
        'description' => '请选择要登录的账号。',
    ],

    'conflict' => [
        'title' => '此 Discord 已被绑定',
        'already_linked' => '此 Discord 账号已绑定到网站上的一个现有账号。您可以登录该账号，或者在允许重复的情况下创建一个新账号。',
        'login' => '登录到现有账号',
        'register' => '仍然创建新账号',
    ],

    'confirm' => [
        'description' => '您的账号没有密码：请重新登录 Discord 以确认您的身份。',
        'button' => '使用 Discord 确认',
        'mismatch' => '这不是绑定到您个人资料的 Discord 账号。',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Discord 登录已绑定到 :name。',
        'bypass_2fa' => '允许 Discord 登录绕过双重身份验证',
        'no_password' => '您的账号尚未设置密码。您可以在此处创建密码，以便在不使用 Discord 的情况下也能登录。',
        'set_password' => '设置密码',
        'unlink_locked' => '解绑 Discord 账号前必须先设置密码，否则您将无法再登录您的账号。',
    ],

    'tools' => [
        'recovery_dm' => "您好！:site 的管理员为您的账号生成了一个新密码：\n\n:password\n\n下次使用该密码登录时，系统会要求您更改密码。",
        'recovery_codes_dm' => "您好！:site 的管理员已重新生成您的双重验证恢复代码。您之前的代码已失效。以下是您的新代码 —— 请妥善保管：\n\n:codes",
    ],
];
