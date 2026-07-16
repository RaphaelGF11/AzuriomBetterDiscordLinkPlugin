<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'Esta conta do Discord já está vinculada a outra conta.',
    'email_mismatch' => 'Login realizado com sucesso. Aviso: o endereço de e-mail da sua conta do Discord não corresponde ao da sua conta.',
    'password_login_disabled' => 'Esta conta não possui senha definida: faça login com o Discord.',
    'guild_required' => 'Você precisa entrar no nosso servidor do Discord antes de poder fazer login ou se cadastrar com o Discord.',
    'guild_notice' => 'Você precisará entrar no nosso servidor do Discord para vincular sua conta.',

    'login' => [
        'button' => 'Entrar com Discord',
    ],

    'register' => [
        'button' => 'Cadastrar-se com Discord',
        'title' => 'Complete seu cadastro',
        'not_found' => 'Ainda não há nenhuma conta vinculada a este Discord. Preencha as informações abaixo para criar sua conta.',
        'duplicate_notice' => 'Esta conta do Discord já está vinculada a outra conta, mas você optou por criar uma nova mesmo assim. Preencha as informações abaixo.',
        'email_help' => 'O e-mail da sua conta do Discord, usado para sua conta.',
        'password_optional' => 'Senha (opcional)',
        'password_help' => 'Se você não definir uma senha, só poderá fazer login pelo Discord (você pode definir uma depois no seu perfil).',
        'submit' => 'Criar minha conta',
        'email_used' => 'Este endereço de e-mail já está sendo usado por outra conta.',
    ],

    'choose' => [
        'title' => 'Várias contas estão vinculadas a este Discord',
        'description' => 'Escolha em qual conta deseja entrar.',
    ],

    'conflict' => [
        'title' => 'Este Discord já está vinculado',
        'already_linked' => 'Esta conta do Discord já está vinculada a uma conta existente no site. Você pode entrar nessa conta ou criar uma nova, caso duplicatas sejam permitidas.',
        'login' => 'Entrar na conta existente',
        'register' => 'Criar uma nova conta mesmo assim',
    ],

    'confirm' => [
        'description' => 'Sua conta não tem senha: confirme sua identidade fazendo login novamente no Discord.',
        'button' => 'Confirmar com Discord',
        'mismatch' => 'Esta não é a conta do Discord vinculada ao seu perfil.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Login com Discord vinculado a :name.',
        'bypass_2fa' => 'Permitir que o login com Discord ignore a autenticação de dois fatores',
        'no_password' => 'Sua conta não tem senha definida. Você pode criar uma aqui para também poder entrar sem o Discord.',
        'set_password' => 'Definir uma senha',
        'unlink_locked' => 'Você deve definir uma senha antes de desvincular sua conta do Discord, caso contrário não conseguirá mais entrar na sua conta.',
    ],

    'tools' => [
        'recovery_dm' => "Olá! Um administrador de :site gerou uma nova senha para sua conta:\n\n:password\n\nVocê será solicitado a alterá-la no próximo login com ela.",
        'recovery_codes_dm' => "Olá! Um administrador de :site regenerou seus códigos de recuperação de autenticação de dois fatores. Seus códigos anteriores não funcionam mais. Aqui estão seus novos códigos — guarde-os em um local seguro:\n\n:codes",
    ],
];
