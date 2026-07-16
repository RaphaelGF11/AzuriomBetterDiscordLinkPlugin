<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'Bu Discord hesabı zaten başka bir hesaba bağlı.',
    'email_mismatch' => 'Giriş başarılı. Uyarı: Discord hesabınızın e-posta adresi hesabınızın e-postasıyla eşleşmiyor.',
    'password_login_disabled' => 'Bu hesap için bir şifre belirlenmemiş: bunun yerine Discord ile giriş yapın.',
    'guild_required' => 'Discord ile giriş yapabilmeniz veya kaydolabilmeniz için önce Discord sunucumuza katılmanız gerekiyor.',
    'guild_notice' => 'Hesabınızı bağlamak için Discord sunucumuza katılmanız gerekecek.',

    'login' => [
        'button' => 'Discord ile giriş yap',
    ],

    'register' => [
        'button' => 'Discord ile kaydol',
        'title' => 'Kaydınızı tamamlayın',
        'not_found' => 'Bu Discord hesabına henüz bağlı bir hesap yok. Hesabınızı oluşturmak için aşağıdaki bilgileri doldurun.',
        'duplicate_notice' => 'Bu Discord hesabı zaten başka bir hesaba bağlı, ancak yine de yeni bir hesap oluşturmayı seçtiniz. Aşağıdaki bilgileri doldurun.',
        'email_help' => 'Hesabınız için kullanılan Discord hesabınızın e-postası.',
        'password_optional' => 'Şifre (isteğe bağlı)',
        'password_help' => 'Bir şifre belirlemezseniz yalnızca Discord üzerinden giriş yapabilirsiniz (daha sonra profilinizden bir tane belirleyebilirsiniz).',
        'submit' => 'Hesabımı oluştur',
        'email_used' => 'Bu e-posta adresi başka bir hesap tarafından zaten kullanılıyor.',
    ],

    'choose' => [
        'title' => 'Bu Discord hesabına birden fazla hesap bağlı',
        'description' => 'Hangi hesaba giriş yapmak istediğinizi seçin.',
    ],

    'conflict' => [
        'title' => 'Bu Discord zaten bağlı',
        'already_linked' => 'Bu Discord hesabı sitede mevcut bir hesaba zaten bağlı. Bu hesaba giriş yapabilir veya kopyalara izin veriliyorsa yeni bir hesap oluşturabilirsiniz.',
        'login' => 'Mevcut hesaba giriş yap',
        'register' => 'Yine de yeni bir hesap oluştur',
    ],

    'confirm' => [
        'description' => 'Hesabınızın şifresi yok: Discord\'a tekrar giriş yaparak kimliğinizi doğrulayın.',
        'button' => "Discord ile onayla",
        'mismatch' => 'Bu, profilinize bağlı Discord hesabı değil.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Discord girişi :name ile bağlandı.',
        'bypass_2fa' => 'Discord girişinin iki faktörlü kimlik doğrulamayı atlamasına izin ver',
        'no_password' => 'Hesabınız için bir şifre belirlenmemiş. Discord olmadan da giriş yapabilmek için burada bir tane oluşturabilirsiniz.',
        'set_password' => 'Bir şifre belirle',
        'unlink_locked' => 'Discord hesabınızın bağlantısını kesmeden önce bir şifre belirlemeniz gerekir, aksi takdirde hesabınıza artık giriş yapamazsınız.',
    ],

    'tools' => [
        'recovery_dm' => "Merhaba! :site yöneticilerinden biri hesabınız için yeni bir şifre oluşturdu:\n\n:password\n\nBu şifreyle bir sonraki girişinizde değiştirmeniz istenecektir.",
        'recovery_codes_dm' => "Merhaba! :site yöneticilerinden biri iki faktörlü kimlik doğrulama kurtarma kodlarınızı yeniden oluşturdu. Önceki kodlarınız artık çalışmıyor. İşte yeni kodlarınız - güvenli bir yerde saklayın:\n\n:codes",
    ],
];
