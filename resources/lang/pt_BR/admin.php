<?php

return [
    'permission' => 'Gerenciar configurações de login com Discord',
    'allow_duplicates' => 'Permitir vínculos duplicados do Discord',
    'allow_duplicates_help' => 'Se ativado, a mesma conta do Discord pode ser vinculada a várias contas do site; no login, o usuário escolherá em qual conta entrar. Se desativado, a vinculação é recusada caso esse Discord já esteja vinculado a outra conta.',
    'allow_passwordless' => 'Permitir a criação de contas sem senha',
    'allow_passwordless_help' => 'Se ativado, a senha é opcional ao se cadastrar com o Discord (a conta só poderá entrar via Discord até que uma senha seja definida no perfil). Se desativado, uma senha é obrigatória para criar uma conta com o Discord.',
    'http_warning' => 'Este site é carregado via HTTP (não seguro). O Discord só aceita URLs de redirecionamento HTTPS, exceto para a exceção localhost/127.0.0.1 no desenvolvimento local. Os callbacks falharão até que o site seja servido via HTTPS.',
    'custom_credentials' => 'Usar credenciais dedicadas do Discord',
    'custom_credentials_help' => 'Se ativado, este plugin usará o client ID / secret abaixo em vez dos configurados no gerenciamento de cargos. As URLs de redirecionamento listadas acima deverão então ser adicionadas a esse aplicativo dedicado do Discord.',
    'bot_token' => 'Token do bot',
    'bot_token_help' => 'O token de um bot do Discord convidado para seu(s) servidor(es) com as permissões "Gerenciar Cargos" e "Criar Convite Instantâneo". Necessário para as ferramentas de administração do Discord, a sincronização de cargos e a opção "Restringir a membros de um servidor" abaixo — opcional caso contrário.',
    'bot_token_shared_help' => 'Atualmente reutilizando o token do bot já configurado na página Gerenciamento de cargos &rarr; Vincular cargos ao Discord. Ative "Usar credenciais dedicadas do Discord" acima para usar um bot diferente.',
    'customizable_email' => 'Permitir e-mail de cadastro personalizável',
    'customizable_email_help' => 'Se ativado, o usuário pode escolher um endereço de e-mail diferente do seu e-mail do Discord ao concluir o cadastro, em vez de ficar restrito ao e-mail do Discord. Não pode ser ativado junto com "Corresponder contas pelo endereço de e-mail".',
    'match_by_email' => 'Corresponder contas pelo endereço de e-mail',
    'match_by_email_help' => 'Se ativado, quando nenhuma conta estiver vinculada a esse Discord, o login tentará encontrar uma conta do site cujo e-mail corresponda ao e-mail (verificado) do Discord. Vínculos explícitos sempre têm prioridade.',
    'incompatible_with_match_by_email' => 'Esta configuração não pode ser ativada ao mesmo tempo que ":option".',
    'sync_avatar' => 'Sincronizar avatar com o Discord',
    'sync_avatar_help' => 'Se ativado, o avatar do usuário no site é definido como seu avatar do Discord em cada login/cadastro, e sempre que um admin usar "Atualizar informações do Discord" abaixo.',
    'required_guild' => 'Restringir a membros de um servidor',
    'required_guild_help' => 'Se um ID de servidor for definido, entrar ou se cadastrar com o Discord exige ser membro desse servidor — o usuário é adicionado automaticamente a ele (seu consentimento para a permissão "guilds.join" é solicitado pelo próprio Discord, na tela de autorização) caso ainda não seja membro. Requer um token de bot acima, convidado para esse servidor com a permissão "Criar Convite Instantâneo". Deixe o ID do servidor vazio para desativar essa restrição.',
    'required_guild_id' => 'ID do servidor',
    'bypass_maintenance' => 'Permitir login com Discord durante a manutenção',
    'bypass_maintenance_help' => 'Se ativado, o login com Discord permanece possível mesmo enquanto o modo de manutenção estiver ativo, sem exigir a permissão de acesso à manutenção. Se desativado, seguem-se as mesmas regras do login clássico.',

    'users' => [
        'no_password_warning' => 'Esta conta não tem senha definida. Atualmente só é possível fazer login pelo Discord. Definir uma senha abaixo também habilitará o login clássico por senha.',
        'no_password_error' => 'Esta conta não tem senha definida. No momento, ela não pode fazer login de forma alguma. Definir uma senha abaixo habilitará o login clássico por senha.',
    ],

    'force_unlink' => [
        'button' => 'Desvincular (bloqueia a conta)',
        'title' => 'Desvincular esta conta do Discord sem senha?',
        'warning' => 'Este vínculo do Discord é atualmente a única forma de login desta conta. Desvinculá-lo bloqueará a conta até que uma senha seja definida abaixo - isso não é feito automaticamente.',
        'confirm' => 'Desvincular mesmo assim',
    ],

    'tools' => [
        'title' => 'Ferramentas do Discord',
        'bot_unavailable' => 'Configure um token de bot nas configurações do plugin para desbloquear o envio de uma DM, uma senha de recuperação, ou códigos de recuperação 2FA.',

        'dm' => [
            'button' => 'Enviar uma DM',
            'title' => 'Enviar uma DM do Discord',
            'content_label' => 'Mensagem',
            'confirm' => 'Enviar',
            'sent' => 'A mensagem foi enviada.',
            'failed' => 'Não foi possível enviar a mensagem — o bot e este usuário podem não compartilhar um servidor, ou o usuário pode ter as DMs desativadas.',
        ],

        'recovery_password' => [
            'button' => 'Enviar uma senha de recuperação',
            'title' => 'Enviar uma senha de recuperação',
            'warning' => 'Isso gera uma nova senha aleatória, força sua alteração no próximo login, e a envia ao usuário via DM do Discord.',
            'invalidate_sessions' => 'Também encerrar todas as sessões atualmente abertas',
            'invalidate_sessions_help' => 'Renova o token "lembrar de mim", e além disso limpa imediatamente as sessões do usuário se o site usar o driver de sessão de banco de dados. Com outros drivers de sessão, sessões já abertas podem permanecer conectadas até expirarem por conta própria.',
            'confirm' => 'Enviar',
            'sent' => 'A senha de recuperação foi gerada e enviada.',
        ],

        'refresh' => [
            'button' => 'Atualizar informações do Discord',
            'title' => 'Atualizar informações do Discord',
            'description' => 'Busca o nome de usuário atual deste usuário no Discord (e seu avatar, se a sincronização de avatar estiver ativada) no Discord, caso ele o tenha alterado lá.',
            'confirm' => 'Atualizar',
            'done' => 'As informações do Discord foram atualizadas.',
            'failed' => 'Não foi possível contatar o Discord para atualizar as informações desta conta.',
        ],

        'recovery_codes' => [
            'button' => 'Enviar códigos de recuperação 2FA',
            'title' => 'Enviar códigos de recuperação 2FA',
            'warning' => 'Isso substitui os códigos de recuperação de dois fatores existentes do usuário por um novo conjunto, e os envia via DM do Discord. Os códigos antigos param de funcionar imediatamente.',
            'confirm' => 'Enviar',
            'sent' => 'Novos códigos de recuperação foram gerados e enviados.',
        ],
    ],

    'role_sync' => [
        'title' => 'Sincronização de cargos do Discord',
        'description' => 'Concede automaticamente um cargo de servidor do Discord aos usuários que atendem às condições de uma regra, e o remove assim que deixam de atendê-las (verificado em tempo real em mudanças relevantes, e em uma programação para também capturar casos como uma assinatura expirada).',
        'bot_unavailable' => 'Configure um token de bot nas configurações acima para desbloquear a sincronização de cargos do Discord.',
        'create' => 'Criar uma regra',
        'edit' => 'Editar a regra',
        'empty' => 'Ainda não há regras de sincronização.',
        'guild_id' => 'ID do servidor',
        'role_id' => 'ID do cargo',
        'conditions' => 'Condições',
        'condition_site_roles' => 'Cargo do site: :roles',
        'condition_shop_package' => 'Possui o pacote: :package',
        'condition_balance' => 'Saldo entre :min e :max',
        'no_conditions' => 'Nenhuma (aplica-se a todos)',
        'conditions_title' => 'Condições',
        'conditions_help' => 'Todas as condições definidas abaixo devem ser atendidas juntas para que esta regra conceda seu cargo. Deixe uma condição vazia/não selecionada para não verificá-la. Várias regras podem ter como alvo o mesmo cargo de servidor: basta atender a uma delas para obtê-lo.',
        'condition_site_roles_label' => 'Restringir a determinados cargos do site',
        'condition_site_roles_help' => 'Deixe todas as caixas desmarcadas para não verificar esta condição.',
        'condition_shop_package_label' => 'Requer possuir este pacote da loja',
        'no_condition' => 'Não verificar esta condição',
        'balance_min' => 'Saldo mínimo',
        'balance_max' => 'Saldo máximo',
        'discord_role_title' => 'Cargo do Discord a conceder',
    ],

    'email_warning' => [
        'title' => 'Aviso de segurança',
        'body' => 'Corresponder contas pelo endereço de e-mail é menos seguro do que pelo ID do Discord: qualquer pessoa que controle um endereço de e-mail verificado no Discord poderá entrar na conta do site com esse endereço, sem que nenhum vínculo tenha sido feito. Se uma conta de e-mail for comprometida ou reutilizada, o mesmo vale para a conta do site. Ative esta opção somente se você entender esse risco.',
        'confirm' => 'Eu entendo o risco',
    ],

    'info' => [
        'setup' => 'Este plugin reutiliza o aplicativo do Discord configurado em <a href=":url">Gerenciamento de cargos &rarr; Vincular cargos ao Discord</a> (client ID / client secret). Configure-o lá primeiro, caso ainda não tenha feito isso.',
        'redirect_intro' => 'No <b>portal de desenvolvedores do Discord</b>, em <b>OAuth2</b> &rarr; <b>General</b>, adicione também estas URLs aos <b>Redirects</b> (além da do vínculo de perfil):',
    ],

    'test' => [
        'title' => 'Testar a configuração',
        'description' => 'Verifique se o client ID/secret são válidos e, em seguida, execute um login de teste real para confirmar que as URLs de redirecionamento estão realmente registradas no Discord (essa é a única forma confiável de verificar: o Discord só as valida na tela de autorização, não antes).',
        'credentials_button' => 'Verificar client ID / secret',
        'bot_token_button' => 'Verificar token do bot',
        'bot_token_ok' => 'O token do bot é válido.',
        'bot_token_invalid' => 'O token do bot está ausente ou incorreto.',
        'callback_button_login' => 'Testar o callback de login',
        'callback_button_confirm' => 'Testar o callback de confirmação',
        'callback_help' => 'Esses botões realmente redirecionam você para o Discord, usando as duas URLs listadas acima. Se você voltar a esta página com uma mensagem de sucesso, isso confirma que a URL testada está registrada. Se o Discord mostrar um erro de "invalid redirect_uri" antes mesmo de pedir para você entrar, essa URL está ausente ou incorreta.',
        'not_configured' => 'Nenhum client ID / secret do Discord está configurado. Configure-os primeiro no gerenciamento de cargos.',
        'network_error' => 'Não foi possível conectar à API do Discord. Tente novamente mais tarde.',
        'credentials_invalid' => 'O client ID ou o client secret está incorreto.',
        'credentials_ok' => 'O client ID e o client secret são válidos.',
        'callback_failed' => 'O teste falhou. Verifique se a URL de redirecionamento testada está registrada no Discord e se o client secret está correto.',
        'callback_ok' => 'Teste bem-sucedido como :name — essa URL de redirecionamento está corretamente registrada no Discord.',
    ],
];
