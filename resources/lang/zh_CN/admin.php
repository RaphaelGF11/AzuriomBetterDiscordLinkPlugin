<?php

return [
    'permission' => '管理 Discord 登录设置',
    'allow_duplicates' => '允许重复的 Discord 绑定',
    'allow_duplicates_help' => '启用后，同一个 Discord 账号可以绑定到多个网站账号；登录时用户可选择要登录的账号。禁用后，如果该 Discord 已绑定到另一个账号，则拒绝绑定。',
    'allow_passwordless' => '允许创建无密码账号',
    'allow_passwordless_help' => '启用后，使用 Discord 注册时密码为可选项（在个人资料中设置密码之前，该账号只能通过 Discord 登录）。禁用后，使用 Discord 创建账号需要设置密码。',
    'http_warning' => '此网站通过 HTTP 加载（不安全）。除本地开发使用的 localhost/127.0.0.1 例外情况外，Discord 只接受 HTTPS 重定向 URL。在网站通过 HTTPS 提供服务之前，回调将会失败。',
    'custom_credentials' => '使用专用的 Discord 凭据',
    'custom_credentials_help' => '启用后，此插件将使用下方的 client ID / secret，而不是在角色管理中配置的凭据。上面列出的重定向 URL 需要添加到该专用 Discord 应用程序中。',
    'bot_token' => '机器人令牌',
    'bot_token_help' => '已受邀加入您的服务器并拥有"管理角色"和"创建即时邀请"权限的 Discord 机器人令牌。使用 Discord 管理工具、角色同步以及下方的"限制为服务器成员"选项时需要此令牌 - 否则为可选项。',
    'bot_token_shared_help' => '当前重用了角色管理 &rarr; 将角色与 Discord 关联页面中已配置的机器人令牌。启用上方的"使用专用的 Discord 凭据"以使用其他机器人。',
    'customizable_email' => '允许自定义注册邮箱',
    'customizable_email_help' => '启用后，用户在完成注册时可以选择与其 Discord 邮箱不同的邮箱地址，而不是被限定为 Discord 邮箱。不能与"通过邮箱地址匹配账号"同时启用。',
    'match_by_email' => '通过邮箱地址匹配账号',
    'match_by_email_help' => '启用后，当没有账号绑定到该 Discord 时，登录将尝试查找邮箱地址与（已验证的）Discord 邮箱匹配的网站账号。显式绑定始终具有更高优先级。',
    'incompatible_with_match_by_email' => '此设置不能与 ":option" 同时启用。',
    'sync_avatar' => '将头像与 Discord 同步',
    'sync_avatar_help' => '启用后，用户的网站头像会在每次登录/注册时，以及管理员每次使用下方的"刷新 Discord 信息"时，被设置为其 Discord 头像。',
    'required_guild' => '限制为服务器成员',
    'required_guild_help' => '如果设置了服务器 ID，使用 Discord 登录或注册需要成为该服务器的成员——如果用户尚未加入，系统会自动将其添加（Discord 会在授权界面自行请求用户对"guilds.join"权限的同意）。这需要上方的机器人令牌，且该机器人需已受邀加入该服务器并拥有"创建即时邀请"权限。将服务器 ID 留空可禁用此限制。',
    'required_guild_id' => '服务器 ID',
    'bypass_maintenance' => '允许在维护期间使用 Discord 登录',
    'bypass_maintenance_help' => '启用后，即使维护模式处于激活状态，使用 Discord 登录仍然可行，无需拥有维护访问权限。禁用后，遵循与常规登录相同的规则。',

    'users' => [
        'no_password_warning' => '此账号尚未设置密码，目前只能通过 Discord 登录。在下方设置密码后，也将启用传统的密码登录方式。',
        'no_password_error' => '此账号尚未设置密码，目前完全无法登录。在下方设置密码后将启用传统的密码登录方式。',
    ],

    'force_unlink' => [
        'button' => '解除关联（将锁定账号）',
        'title' => '要解除这个没有密码的 Discord 账号的关联吗？',
        'warning' => '此 Discord 关联目前是该账号唯一的登录方式。解除关联将锁定该账号，直到在下方为其设置密码为止——此操作不会自动完成。',
        'confirm' => '仍然解除关联',
    ],

    'tools' => [
        'title' => 'Discord 工具',
        'bot_unavailable' => '请在插件设置中配置机器人令牌，以解锁发送私信、恢复密码或 2FA 恢复代码的功能。',

        'dm' => [
            'button' => '发送私信',
            'title' => '发送 Discord 私信',
            'content_label' => '消息内容',
            'confirm' => '发送',
            'sent' => '消息已发送。',
            'failed' => '无法发送消息 —— 机器人和该用户可能没有共同的服务器，或该用户已关闭私信功能。',
        ],

        'recovery_password' => [
            'button' => '发送恢复密码',
            'title' => '发送恢复密码',
            'warning' => '这将生成一个新的随机密码，强制在下次登录时更改密码，并通过 Discord 私信将其发送给用户。',
            'invalidate_sessions' => '同时退出所有当前打开的会话',
            'invalidate_sessions_help' => '更新"记住我"令牌，如果网站使用数据库会话驱动，还会立即清除该用户的会话。使用其他会话驱动时，已打开的会话可能会保持登录状态，直到自行过期。',
            'confirm' => '发送',
            'sent' => '恢复密码已生成并发送。',
        ],

        'refresh' => [
            'button' => '刷新 Discord 信息',
            'title' => '刷新 Discord 信息',
            'description' => '从 Discord 获取该用户当前的 Discord 用户名（如果启用了头像同步，还包括头像），以防其在 Discord 上有所更改。',
            'confirm' => '刷新',
            'done' => 'Discord 信息已刷新。',
            'failed' => '无法连接 Discord 以刷新该账号的信息。',
        ],

        'recovery_codes' => [
            'button' => '发送 2FA 恢复代码',
            'title' => '发送 2FA 恢复代码',
            'warning' => '这将用一组新的代码替换用户现有的双重验证恢复代码，并通过 Discord 私信发送。旧代码将立即失效。',
            'confirm' => '发送',
            'sent' => '新的恢复代码已生成并发送。',
        ],
    ],

    'role_sync' => [
        'title' => 'Discord 角色同步',
        'description' => '自动为符合某条规则条件的用户授予 Discord 服务器角色，并在其不再符合条件时移除该角色（在相关变更发生时实时检查，并按计划定期检查，以捕获诸如订阅到期等情况）。',
        'bot_unavailable' => '请在上方设置中配置机器人令牌，以解锁 Discord 角色同步功能。',
        'create' => '创建规则',
        'edit' => '编辑规则',
        'empty' => '暂无同步规则。',
        'guild_id' => '服务器 ID',
        'role_id' => '角色 ID',
        'conditions' => '条件',
        'condition_site_roles' => '网站角色：:roles',
        'condition_shop_package' => '拥有商品：:package',
        'condition_balance' => '余额介于 :min 至 :max 之间',
        'no_conditions' => '无（适用于所有人）',
        'conditions_title' => '条件',
        'conditions_help' => '下方设置的所有条件必须同时满足，此规则才会授予其角色。将某项条件留空/不选中即表示不检查该条件。多条规则可以指向同一个服务器角色：只需满足其中一条即可获得该角色。',
        'condition_site_roles_label' => '限制为特定网站角色',
        'condition_site_roles_help' => '将所有复选框保持未选中状态，即表示不检查此条件。',
        'condition_shop_package_label' => '要求拥有此商店商品',
        'no_condition' => '不检查此条件',
        'balance_min' => '最低余额',
        'balance_max' => '最高余额',
        'discord_role_title' => '要授予的 Discord 角色',
    ],

    'email_warning' => [
        'title' => '安全警告',
        'body' => '通过邮箱地址匹配账号的安全性低于通过 Discord ID 匹配：任何控制了 Discord 上已验证邮箱地址的人，都可以登录使用该邮箱地址的网站账号，而无需事先进行任何绑定。如果邮箱账号被盗用或被重新使用，网站账号也会受到影响。仅在您理解此风险的情况下才启用此选项。',
        'confirm' => '我理解此风险',
    ],

    'info' => [
        'setup' => '此插件重用在<a href=":url">角色管理 &rarr; 将角色与 Discord 关联</a>中配置的 Discord 应用程序（client ID / client secret）。如果尚未设置，请先在那里进行配置。',
        'redirect_intro' => '在 <b>Discord 开发者门户</b>中，在 <b>OAuth2</b> &rarr; <b>General</b> 下，除了个人资料绑定所用的 URL 外，请额外将以下 URL 添加到 <b>Redirects</b>：',
    ],

    'test' => [
        'title' => '测试配置',
        'description' => '检查 client ID/secret 是否有效，然后运行一次真实的测试登录，以确认重定向 URL 确实已在 Discord 上注册（这是唯一可靠的检查方式：Discord 只会在授权界面验证它们，而不会提前验证）。',
        'credentials_button' => '检查 client ID / secret',
        'bot_token_button' => '检查机器人令牌',
        'bot_token_ok' => '机器人令牌有效。',
        'bot_token_invalid' => '机器人令牌缺失或不正确。',
        'callback_button_login' => '测试登录回调',
        'callback_button_confirm' => '测试确认回调',
        'callback_help' => '这些按钮会使用上面列出的两个 URL，将您真正重定向到 Discord。如果您带着成功消息返回此页面，即可确认所测试的 URL 已注册。如果 Discord 在要求您登录之前就显示"invalid redirect_uri"错误，则说明该 URL 缺失或不正确。',
        'not_configured' => '尚未配置 Discord client ID / secret。请先在角色管理中进行设置。',
        'network_error' => '无法连接到 Discord API。请稍后重试。',
        'credentials_invalid' => 'client ID 或 client secret 不正确。',
        'credentials_ok' => 'client ID 和 client secret 有效。',
        'callback_failed' => '测试失败。请检查所测试的重定向 URL 是否已在 Discord 上注册，以及 client secret 是否正确。',
        'callback_ok' => '以 :name 身份测试成功 — 该重定向 URL 已正确注册于 Discord。',
    ],
];
