<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => '이 Discord 계정은 이미 다른 계정에 연결되어 있습니다.',
    'email_mismatch' => '로그인에 성공했습니다. 경고: Discord 계정의 이메일 주소가 회원님 계정의 이메일과 일치하지 않습니다.',
    'password_login_disabled' => '이 계정에는 비밀번호가 설정되어 있지 않습니다. 대신 Discord로 로그인하세요.',
    'guild_required' => 'Discord로 로그인하거나 가입하려면 먼저 저희 Discord 서버에 가입해야 합니다.',
    'guild_notice' => '계정을 연결하려면 저희 Discord 서버에 가입해야 합니다.',

    'login' => [
        'button' => 'Discord로 로그인',
    ],

    'register' => [
        'button' => 'Discord로 가입하기',
        'title' => '가입을 완료하세요',
        'not_found' => '이 Discord에 아직 연결된 계정이 없습니다. 아래 정보를 입력하여 계정을 만드세요.',
        'duplicate_notice' => '이 Discord 계정은 이미 다른 계정에 연결되어 있지만, 그래도 새 계정을 만들기로 선택하셨습니다. 아래 정보를 입력하세요.',
        'email_help' => '계정에 사용될 Discord 계정의 이메일입니다.',
        'password_optional' => '비밀번호 (선택 사항)',
        'password_help' => '비밀번호를 설정하지 않으면 Discord를 통해서만 로그인할 수 있습니다 (나중에 프로필에서 설정할 수 있습니다).',
        'submit' => '계정 만들기',
        'email_used' => '이 이메일 주소는 이미 다른 계정에서 사용 중입니다.',
    ],

    'choose' => [
        'title' => '이 Discord에 여러 계정이 연결되어 있습니다',
        'description' => '로그인할 계정을 선택하세요.',
    ],

    'conflict' => [
        'title' => '이 Discord는 이미 연결되어 있습니다',
        'already_linked' => '이 Discord 계정은 이미 사이트의 기존 계정에 연결되어 있습니다. 해당 계정으로 로그인하거나, 중복이 허용된 경우 새 계정을 만들 수 있습니다.',
        'login' => '기존 계정으로 로그인',
        'register' => '그래도 새 계정 만들기',
    ],

    'confirm' => [
        'description' => '회원님의 계정에는 비밀번호가 없습니다. Discord에 다시 로그인하여 본인 확인을 해주세요.',
        'button' => 'Discord로 확인',
        'mismatch' => '이것은 회원님의 프로필에 연결된 Discord 계정이 아닙니다.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => ':name에 연결된 Discord 로그인.',
        'bypass_2fa' => 'Discord 로그인이 2단계 인증을 건너뛰도록 허용',
        'no_password' => '회원님의 계정에는 비밀번호가 설정되어 있지 않습니다. 여기서 비밀번호를 만들면 Discord 없이도 로그인할 수 있습니다.',
        'set_password' => '비밀번호 설정',
        'unlink_locked' => 'Discord 계정 연결을 해제하기 전에 먼저 비밀번호를 설정해야 합니다. 그렇지 않으면 더 이상 계정에 로그인할 수 없습니다.',
    ],

    'tools' => [
        'recovery_dm' => "안녕하세요! :site의 관리자가 회원님의 계정에 새 비밀번호를 생성했습니다:\n\n:password\n\n다음에 이 비밀번호로 로그인할 때 변경하라는 메시지가 표시됩니다.",
        'recovery_codes_dm' => "안녕하세요! :site의 관리자가 회원님의 2단계 인증 복구 코드를 재생성했습니다. 이전 코드는 더 이상 작동하지 않습니다. 새 코드는 다음과 같습니다 - 안전한 곳에 보관하세요:\n\n:codes",
    ],
];
