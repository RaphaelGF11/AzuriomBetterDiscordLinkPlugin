<?php

return [
    'permission' => 'Discord 로그인 설정 관리',
    'allow_duplicates' => '중복된 Discord 연결 허용',
    'allow_duplicates_help' => '활성화하면 동일한 Discord 계정을 여러 사이트 계정에 연결할 수 있으며, 로그인 시 사용자가 로그인할 계정을 선택합니다. 비활성화하면 해당 Discord가 이미 다른 계정에 연결되어 있는 경우 연결이 거부됩니다.',
    'allow_passwordless' => '비밀번호 없는 계정 생성 허용',
    'allow_passwordless_help' => '활성화하면 Discord로 가입할 때 비밀번호가 선택 사항이 됩니다 (프로필에서 비밀번호를 설정하기 전까지는 Discord로만 로그인할 수 있습니다). 비활성화하면 Discord로 계정을 만들 때 비밀번호가 필요합니다.',
    'http_warning' => '이 사이트는 HTTP로 로드되고 있습니다 (안전하지 않음). Discord는 로컬 개발용 localhost/127.0.0.1 예외를 제외하고 HTTPS 리디렉션 URL만 허용합니다. 사이트가 HTTPS로 제공될 때까지 콜백이 실패합니다.',
    'custom_credentials' => '전용 Discord 자격 증명 사용',
    'custom_credentials_help' => '활성화하면 이 플러그인은 역할 관리에서 설정된 것 대신 아래의 client ID / secret을 사용합니다. 위에 나열된 리디렉션 URL은 해당 전용 Discord 애플리케이션에 추가해야 합니다.',
    'bot_token' => '봇 토큰',
    'bot_token_help' => '"역할 관리" 및 "즉석 초대 만들기" 권한으로 서버에 초대된 Discord 봇의 토큰입니다. Discord 관리 도구, 역할 동기화, 아래의 "서버 멤버로 제한" 옵션에 필요합니다 - 그 외에는 선택 사항입니다.',
    'bot_token_shared_help' => '현재 역할 관리 &rarr; Discord와 역할 연결 페이지에 이미 설정된 봇 토큰을 재사용하고 있습니다. 다른 봇을 사용하려면 위의 "전용 Discord 자격 증명 사용"을 활성화하세요.',
    'customizable_email' => '가입 이메일 커스터마이징 허용',
    'customizable_email_help' => '활성화하면 사용자가 가입을 완료할 때 Discord 이메일 대신 다른 이메일 주소를 선택할 수 있습니다. "이메일 주소로 계정 일치"와 동시에 활성화할 수 없습니다.',
    'match_by_email' => '이메일 주소로 계정 일치',
    'match_by_email_help' => '활성화하면 해당 Discord에 연결된 계정이 없을 때, 로그인이 (인증된) Discord 이메일과 일치하는 이메일 주소를 가진 사이트 계정을 찾으려고 시도합니다. 명시적인 연결이 항상 우선합니다.',
    'incompatible_with_match_by_email' => '이 설정은 ":option"과(와) 동시에 활성화할 수 없습니다.',
    'sync_avatar' => 'Discord와 아바타 동기화',
    'sync_avatar_help' => '활성화하면 로그인/가입할 때마다, 그리고 관리자가 아래의 "Discord 정보 새로고침"을 사용할 때마다 사용자의 사이트 아바타가 Discord 아바타로 설정됩니다.',
    'required_guild' => '서버 멤버로 제한',
    'required_guild_help' => '서버 ID가 설정되면 Discord로 로그인 또는 가입하려면 해당 서버의 멤버여야 합니다 - 아직 멤버가 아닌 경우 자동으로 추가됩니다 ("guilds.join" 권한에 대한 동의는 Discord 자체가 승인 화면에서 요청합니다). "즉석 초대 만들기" 권한으로 해당 서버에 초대된 위의 봇 토큰이 필요합니다. 이 제한을 비활성화하려면 서버 ID를 비워두세요.',
    'required_guild_id' => '서버 ID',
    'bypass_maintenance' => '점검 중에도 Discord 로그인 허용',
    'bypass_maintenance_help' => '활성화하면 점검 모드가 활성화된 동안에도 점검 접근 권한 없이 Discord로 로그인할 수 있습니다. 비활성화하면 일반 로그인과 동일한 규칙이 적용됩니다.',

    'users' => [
        'no_password_warning' => '이 계정에는 비밀번호가 설정되어 있지 않습니다. 현재는 Discord로만 로그인할 수 있습니다. 아래에서 비밀번호를 설정하면 일반 비밀번호 로그인도 활성화됩니다.',
        'no_password_error' => '이 계정에는 비밀번호가 설정되어 있지 않습니다. 현재는 전혀 로그인할 수 없습니다. 아래에서 비밀번호를 설정하면 일반 비밀번호 로그인이 활성화됩니다.',
    ],

    'force_unlink' => [
        'button' => '연결 해제 (계정 잠금)',
        'title' => '비밀번호가 없는 이 Discord 계정을 연결 해제하시겠습니까?',
        'warning' => '이 Discord 연결은 현재 이 계정이 로그인할 수 있는 유일한 방법입니다. 연결을 해제하면 아래에서 비밀번호를 설정하기 전까지 계정이 잠깁니다. 이 작업은 자동으로 수행되지 않습니다.',
        'confirm' => '그래도 연결 해제',
    ],

    'tools' => [
        'title' => 'Discord 도구',
        'bot_unavailable' => 'DM 보내기, 복구 비밀번호, 2FA 복구 코드를 사용하려면 플러그인 설정에서 봇 토큰을 구성하세요.',

        'dm' => [
            'button' => 'DM 보내기',
            'title' => 'Discord DM 보내기',
            'content_label' => '메시지',
            'confirm' => '보내기',
            'sent' => '메시지가 전송되었습니다.',
            'failed' => '메시지를 보낼 수 없습니다 - 봇과 이 사용자가 서버를 공유하지 않거나, 사용자가 DM을 차단했을 수 있습니다.',
        ],

        'recovery_password' => [
            'button' => '복구 비밀번호 보내기',
            'title' => '복구 비밀번호 보내기',
            'warning' => '새로운 무작위 비밀번호를 생성하고, 다음 로그인 시 변경을 강제하며, Discord DM으로 사용자에게 전송합니다.',
            'invalidate_sessions' => '현재 열려 있는 모든 세션에서도 로그아웃',
            'invalidate_sessions_help' => '"로그인 상태 유지" 토큰을 갱신하며, 사이트가 데이터베이스 세션 드라이버를 사용하는 경우 사용자의 세션도 즉시 삭제합니다. 다른 세션 드라이버에서는 이미 열려 있는 세션이 자체적으로 만료될 때까지 로그인 상태를 유지할 수 있습니다.',
            'confirm' => '보내기',
            'sent' => '복구 비밀번호가 생성되어 전송되었습니다.',
        ],

        'refresh' => [
            'button' => 'Discord 정보 새로고침',
            'title' => 'Discord 정보 새로고침',
            'description' => '이 사용자가 Discord에서 사용자 이름(및 아바타 동기화가 활성화된 경우 아바타)을 변경했을 경우를 대비해 Discord에서 현재 정보를 가져옵니다.',
            'confirm' => '새로고침',
            'done' => 'Discord 정보가 새로고침되었습니다.',
            'failed' => '이 계정의 정보를 새로고침하기 위해 Discord에 연결할 수 없습니다.',
        ],

        'recovery_codes' => [
            'button' => '2FA 복구 코드 보내기',
            'title' => '2FA 복구 코드 보내기',
            'warning' => '사용자의 기존 2단계 인증 복구 코드를 새로운 세트로 교체하고 Discord DM으로 전송합니다. 이전 코드는 즉시 작동하지 않습니다.',
            'confirm' => '보내기',
            'sent' => '새로운 복구 코드가 생성되어 전송되었습니다.',
        ],
    ],

    'role_sync' => [
        'title' => 'Discord 역할 동기화',
        'description' => '규칙의 조건을 충족하는 사용자에게 Discord 서버 역할을 자동으로 부여하고, 더 이상 충족하지 않으면 제거합니다 (관련 변경 사항에 대해 실시간으로 확인하며, 만료된 구독과 같은 사례도 포착하기 위해 일정에 따라 확인합니다).',
        'bot_unavailable' => 'Discord 역할 동기화를 사용하려면 위 설정에서 봇 토큰을 구성하세요.',
        'create' => '규칙 만들기',
        'edit' => '규칙 편집',
        'empty' => '아직 동기화 규칙이 없습니다.',
        'guild_id' => '서버 ID',
        'role_id' => '역할 ID',
        'conditions' => '조건',
        'condition_site_roles' => '사이트 역할: :roles',
        'condition_shop_package' => '보유 상품: :package',
        'condition_balance' => '잔액이 :min와(과) :max 사이',
        'no_conditions' => '없음 (모두에게 적용)',
        'conditions_title' => '조건',
        'conditions_help' => '이 규칙이 역할을 부여하려면 아래에 설정된 모든 조건이 함께 충족되어야 합니다. 확인하지 않으려면 조건을 비워두거나 선택하지 마세요. 여러 규칙이 동일한 서버 역할을 대상으로 할 수 있으며, 그중 하나만 충족해도 역할을 얻을 수 있습니다.',
        'condition_site_roles_label' => '특정 사이트 역할로 제한',
        'condition_site_roles_help' => '이 조건을 확인하지 않으려면 모든 체크박스를 선택 해제하세요.',
        'condition_shop_package_label' => '이 상점 상품을 보유해야 함',
        'no_condition' => '이 조건을 확인하지 않음',
        'balance_min' => '최소 잔액',
        'balance_max' => '최대 잔액',
        'discord_role_title' => '부여할 Discord 역할',
    ],

    'email_warning' => [
        'title' => '보안 경고',
        'body' => '이메일 주소로 계정을 일치시키는 것은 Discord ID로 일치시키는 것보다 안전하지 않습니다. Discord에서 인증된 이메일 주소를 제어하는 사람은 누구든지 연결이 이루어진 적이 없더라도 해당 주소를 가진 사이트 계정에 로그인할 수 있습니다. 이메일 계정이 침해되거나 재사용되면 사이트 계정도 마찬가지입니다. 이 위험을 이해하는 경우에만 이 옵션을 활성화하세요.',
        'confirm' => '위험을 이해했습니다',
    ],

    'info' => [
        'setup' => '이 플러그인은 <a href=":url">역할 관리 &rarr; Discord와 역할 연결</a>에서 설정된 Discord 애플리케이션(client ID / client secret)을 재사용합니다. 아직 설정하지 않았다면 먼저 그곳에서 설정하세요.',
        'redirect_intro' => '<b>Discord 개발자 포털</b>의 <b>OAuth2</b> &rarr; <b>General</b>에서, 프로필 연결용 URL 외에 다음 URL도 <b>Redirects</b>에 추가하세요:',
    ],

    'test' => [
        'title' => '구성 테스트',
        'description' => 'client ID/secret이 유효한지 확인한 다음, 실제 테스트 로그인을 실행하여 리디렉션 URL이 실제로 Discord에 등록되어 있는지 확인하세요 (이것이 확인할 수 있는 유일하게 신뢰할 수 있는 방법입니다. Discord는 승인 화면에서만 이를 검증하며, 그 이전에는 검증하지 않습니다).',
        'credentials_button' => 'client ID / secret 확인',
        'bot_token_button' => '봇 토큰 확인',
        'bot_token_ok' => '봇 토큰이 유효합니다.',
        'bot_token_invalid' => '봇 토큰이 없거나 올바르지 않습니다.',
        'callback_button_login' => '로그인 콜백 테스트',
        'callback_button_confirm' => '확인 콜백 테스트',
        'callback_help' => '이 버튼들은 위에 나열된 두 URL을 사용하여 실제로 Discord로 리디렉션합니다. 성공 메시지와 함께 이 페이지로 돌아오면 테스트된 URL이 등록되어 있음이 확인됩니다. 로그인을 요청받기도 전에 Discord가 "invalid redirect_uri" 오류를 표시하면 해당 URL이 누락되었거나 잘못된 것입니다.',
        'not_configured' => 'Discord client ID / secret이 구성되어 있지 않습니다. 먼저 역할 관리에서 설정하세요.',
        'network_error' => 'Discord API에 연결할 수 없습니다. 나중에 다시 시도하세요.',
        'credentials_invalid' => 'client ID 또는 client secret이 올바르지 않습니다.',
        'credentials_ok' => 'client ID와 client secret이 유효합니다.',
        'callback_failed' => '테스트에 실패했습니다. 테스트된 리디렉션 URL이 Discord에 등록되어 있는지, client secret이 올바른지 확인하세요.',
        'callback_ok' => ':name(으)로 테스트에 성공했습니다 — 해당 리디렉션 URL이 Discord에 올바르게 등록되어 있습니다.',
    ],
];
