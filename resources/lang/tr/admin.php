<?php

return [
    'permission' => 'Discord giriş ayarlarını yönet',
    'allow_duplicates' => 'Yinelenen Discord bağlantılarına izin ver',
    'allow_duplicates_help' => 'Etkinleştirilirse, aynı Discord hesabı birden fazla site hesabına bağlanabilir; girişte kullanıcı hangi hesaba gireceğini seçer. Devre dışı bırakılırsa, bu Discord zaten başka bir hesaba bağlıysa bağlantı reddedilir.',
    'allow_passwordless' => 'Şifresiz hesap oluşturmaya izin ver',
    'allow_passwordless_help' => 'Etkinleştirilirse, Discord ile kaydolurken şifre isteğe bağlıdır (hesap, profilden bir şifre belirlenene kadar yalnızca Discord üzerinden giriş yapabilir). Devre dışı bırakılırsa, Discord ile hesap oluşturmak için şifre gereklidir.',
    'http_warning' => 'Bu site HTTP üzerinden yükleniyor (güvenli değil). Discord, yerel geliştirme için localhost/127.0.0.1 istisnası dışında yalnızca HTTPS yönlendirme URL\'lerini kabul eder. Site HTTPS üzerinden sunulana kadar callback\'ler başarısız olacaktır.',
    'custom_credentials' => 'Özel Discord kimlik bilgilerini kullan',
    'custom_credentials_help' => 'Etkinleştirilirse, bu eklenti rol yönetiminde yapılandırılanlar yerine aşağıdaki client ID / secret bilgilerini kullanacaktır. Yukarıda listelenen yönlendirme URL\'lerinin bu özel Discord uygulamasına eklenmesi gerekecektir.',
    'bot_token' => 'Bot tokeni',
    'bot_token_help' => '"Rolleri Yönet" ve "Anlık Davet Oluştur" izinleriyle sunucunuza/sunucularınıza davet edilmiş bir Discord botunun tokeni. Discord admin araçları, rol senkronizasyonu ve aşağıdaki "Sunucu üyeleriyle sınırla" seçeneği için gereklidir - aksi takdirde isteğe bağlıdır.',
    'bot_token_shared_help' => 'Şu anda Rol yönetimi &rarr; Rolleri Discord ile bağla sayfasında zaten yapılandırılmış bot tokeni yeniden kullanılıyor. Farklı bir bot kullanmak için yukarıdaki "Özel Discord kimlik bilgilerini kullan" seçeneğini etkinleştirin.',
    'customizable_email' => 'Özelleştirilebilir kayıt e-postasına izin ver',
    'customizable_email_help' => 'Etkinleştirilirse, kullanıcı kaydı tamamlarken Discord e-postası yerine farklı bir e-posta adresi seçebilir. "Hesapları e-posta adresine göre eşleştir" ile aynı anda etkinleştirilemez.',
    'match_by_email' => 'Hesapları e-posta adresine göre eşleştir',
    'match_by_email_help' => 'Etkinleştirilirse, o Discord\'a bağlı hiçbir hesap olmadığında, giriş, e-posta adresi (doğrulanmış) Discord e-postasıyla eşleşen bir site hesabı bulmaya çalışır. Açık bağlantılar her zaman önceliklidir.',
    'incompatible_with_match_by_email' => 'Bu ayar ":option" ile aynı anda etkinleştirilemez.',
    'sync_avatar' => 'Avatarı Discord ile senkronize et',
    'sync_avatar_help' => 'Etkinleştirilirse, kullanıcının site avatarı her girişte/kayıtta ve bir yönetici aşağıdaki "Discord bilgilerini yenile" özelliğini her kullandığında Discord avatarına ayarlanır.',
    'required_guild' => 'Sunucu üyeleriyle sınırla',
    'required_guild_help' => 'Bir sunucu ID\'si ayarlanırsa, Discord ile giriş yapmak veya kaydolmak o sunucuya üye olmayı gerektirir - henüz üye değilse kullanıcı otomatik olarak eklenir ("guilds.join" iznine rızası, yetkilendirme ekranında Discord\'un kendisi tarafından istenir). Yukarıdaki bot tokeninin "Anlık Davet Oluştur" izniyle o sunucuya davet edilmiş olması gerekir. Bu kısıtlamayı devre dışı bırakmak için sunucu ID\'sini boş bırakın.',
    'required_guild_id' => 'Sunucu ID\'si',
    'bypass_maintenance' => 'Bakım sırasında Discord ile girişe izin ver',
    'bypass_maintenance_help' => 'Etkinleştirilirse, bakım modu etkinken bile Discord ile giriş yapmak mümkün olmaya devam eder, bakım erişim izni gerektirmez. Devre dışı bırakılırsa, klasik girişle aynı kurallar uygulanır.',

    'users' => [
        'no_password_warning' => 'Bu hesap için bir şifre belirlenmemiş. Şu anda yalnızca Discord ile giriş yapılabilir. Aşağıda bir şifre belirlemek klasik şifreyle girişi de etkinleştirecektir.',
        'no_password_error' => 'Bu hesap için bir şifre belirlenmemiş. Şu anda hiç giriş yapamaz. Aşağıda bir şifre belirlemek klasik şifreyle girişi etkinleştirecektir.',
    ],

    'force_unlink' => [
        'button' => 'Bağlantıyı kaldır (hesabı kilitler)',
        'title' => 'Bu şifresiz Discord hesabının bağlantısı kaldırılsın mı?',
        'warning' => 'Bu Discord bağlantısı şu anda bu hesabın giriş yapabildiği tek yoldur. Bağlantıyı kaldırmak, aşağıda bir şifre verilene kadar hesabı kilitleyecektir - bu otomatik olarak yapılmaz.',
        'confirm' => 'Yine de bağlantıyı kaldır',
    ],

    'tools' => [
        'title' => 'Discord araçları',
        'bot_unavailable' => 'Bir DM, kurtarma şifresi veya 2FA kurtarma kodları göndermeyi etkinleştirmek için eklenti ayarlarında bir bot tokeni yapılandırın.',

        'dm' => [
            'button' => 'DM gönder',
            'title' => 'Discord DM gönder',
            'content_label' => 'Mesaj',
            'confirm' => 'Gönder',
            'sent' => 'Mesaj gönderildi.',
            'failed' => 'Mesaj gönderilemedi - bot ve bu kullanıcı bir sunucuyu paylaşmıyor olabilir veya kullanıcı DM\'leri kapatmış olabilir.',
        ],

        'recovery_password' => [
            'button' => 'Kurtarma şifresi gönder',
            'title' => 'Kurtarma şifresi gönder',
            'warning' => 'Bu, yeni bir rastgele şifre oluşturur, bir sonraki girişte değiştirilmesini zorunlu kılar ve Discord DM üzerinden kullanıcıya gönderir.',
            'invalidate_sessions' => 'Ayrıca şu anda açık olan tüm oturumlardan çıkış yap',
            'invalidate_sessions_help' => '"Beni hatırla" tokenini yeniler ve site veritabanı oturum sürücüsünü kullanıyorsa kullanıcının oturumlarını hemen temizler. Diğer oturum sürücüleriyle, zaten açık olan oturumlar kendi süreleri dolana kadar giriş yapmış kalabilir.',
            'confirm' => 'Gönder',
            'sent' => 'Kurtarma şifresi oluşturuldu ve gönderildi.',
        ],

        'refresh' => [
            'button' => 'Discord bilgilerini yenile',
            'title' => 'Discord bilgilerini yenile',
            'description' => 'Bu kullanıcının orada değiştirmiş olabileceği ihtimaline karşı, mevcut Discord kullanıcı adını (ve avatar senkronizasyonu etkinse avatarını) Discord\'dan alır.',
            'confirm' => 'Yenile',
            'done' => 'Discord bilgileri yenilendi.',
            'failed' => 'Bu hesabın bilgilerini yenilemek için Discord\'a ulaşılamadı.',
        ],

        'recovery_codes' => [
            'button' => '2FA kurtarma kodlarını gönder',
            'title' => '2FA kurtarma kodlarını gönder',
            'warning' => 'Bu, kullanıcının mevcut iki faktörlü kurtarma kodlarını yeni bir setle değiştirir ve Discord DM üzerinden gönderir. Eski kodlar hemen çalışmayı durdurur.',
            'confirm' => 'Gönder',
            'sent' => 'Yeni kurtarma kodları oluşturuldu ve gönderildi.',
        ],
    ],

    'role_sync' => [
        'title' => 'Discord rol senkronizasyonu',
        'description' => 'Bir kuralın koşullarını karşılayan kullanıcılara otomatik olarak bir Discord sunucu rolü verir ve artık karşılamadıklarında kaldırır (ilgili değişikliklerde gerçek zamanlı olarak kontrol edilir ve süresi dolmuş bir abonelik gibi durumları da yakalamak için bir zamanlamaya göre kontrol edilir).',
        'bot_unavailable' => 'Discord rol senkronizasyonunu etkinleştirmek için yukarıdaki ayarlarda bir bot tokeni yapılandırın.',
        'create' => 'Kural oluştur',
        'edit' => 'Kuralı düzenle',
        'empty' => 'Henüz senkronizasyon kuralı yok.',
        'guild_id' => 'Sunucu ID\'si',
        'role_id' => 'Rol ID\'si',
        'conditions' => 'Koşullar',
        'condition_site_roles' => 'Site rolü: :roles',
        'condition_shop_package' => 'Ürüne sahip: :package',
        'condition_balance' => ':min ile :max arasında bakiye',
        'no_conditions' => 'Yok (herkes için geçerli)',
        'conditions_title' => 'Koşullar',
        'conditions_help' => 'Bu kuralın rolünü verebilmesi için aşağıda belirlenen tüm koşulların birlikte karşılanması gerekir. Kontrol etmemek için bir koşulu boş/seçilmemiş bırakın. Birden fazla kural aynı sunucu rolünü hedefleyebilir: onu almak için bunlardan birine uymak yeterlidir.',
        'condition_site_roles_label' => 'Belirli site rolleriyle sınırla',
        'condition_site_roles_help' => 'Bu koşulu kontrol etmemek için tüm kutuları işaretsiz bırakın.',
        'condition_shop_package_label' => 'Bu mağaza ürününe sahip olmayı gerektirir',
        'no_condition' => 'Bu koşulu kontrol etme',
        'balance_min' => 'Minimum bakiye',
        'balance_max' => 'Maksimum bakiye',
        'discord_role_title' => 'Verilecek Discord rolü',
    ],

    'email_warning' => [
        'title' => 'Güvenlik uyarısı',
        'body' => 'Hesapları e-posta adresine göre eşleştirmek, Discord kimliğine göre eşleştirmekten daha az güvenlidir: Discord\'da doğrulanmış bir e-posta adresini kontrol eden herkes, hiçbir bağlantı hiç yapılmamış olsa bile, o adrese sahip site hesabına giriş yapabilecektir. Bir e-posta hesabı ele geçirilir veya yeniden kullanılırsa, site hesabı için de aynı durum geçerlidir. Bu seçeneği yalnızca bu riski anladığınızda etkinleştirin.',
        'confirm' => 'Riski anlıyorum',
    ],

    'info' => [
        'setup' => 'Bu eklenti, <a href=":url">Rol yönetimi &rarr; Rolleri Discord ile bağla</a> bölümünde yapılandırılan Discord uygulamasını (client ID / client secret) yeniden kullanır. Henüz yapmadıysanız önce orada ayarlayın.',
        'redirect_intro' => '<b>Discord geliştirici portalında</b>, <b>OAuth2</b> &rarr; <b>General</b> altında, profil bağlantısı URL\'sine ek olarak bu URL\'leri de <b>Redirects</b> alanına ekleyin:',
    ],

    'test' => [
        'title' => 'Yapılandırmayı test et',
        'description' => 'Client ID/secret bilgilerinin geçerli olduğunu kontrol edin, ardından yönlendirme URL\'lerinin Discord\'da gerçekten kayıtlı olduğunu doğrulamak için gerçek bir test girişi çalıştırın (bu, kontrol etmenin tek güvenilir yoludur: Discord bunları yalnızca yetkilendirme ekranında doğrular, öncesinde değil).',
        'credentials_button' => 'Client ID / secret kontrol et',
        'bot_token_button' => 'Bot tokenini kontrol et',
        'bot_token_ok' => 'Bot tokeni geçerli.',
        'bot_token_invalid' => 'Bot tokeni eksik veya yanlış.',
        'callback_button_login' => "Giriş callback'ini test et",
        'callback_button_confirm' => "Onay callback'ini test et",
        'callback_help' => 'Bu düğmeler, yukarıda listelenen iki URL\'yi kullanarak sizi gerçekten Discord\'a yönlendirir. Bu sayfaya bir başarı mesajıyla dönerseniz, bu, test edilen URL\'nin kayıtlı olduğunu doğrular. Discord, giriş yapmanızı istemeden önce bile "invalid redirect_uri" hatası gösteriyorsa, bu URL eksik veya yanlıştır.',
        'not_configured' => 'Hiçbir Discord client ID / secret yapılandırılmamış. Önce bunları rol yönetiminde ayarlayın.',
        'network_error' => 'Discord API\'sine ulaşılamadı. Daha sonra tekrar deneyin.',
        'credentials_invalid' => 'Client ID veya client secret yanlış.',
        'credentials_ok' => 'Client ID ve client secret geçerli.',
        'callback_failed' => 'Test başarısız oldu. Test edilen yönlendirme URL\'sinin Discord\'da kayıtlı olduğunu ve client secret\'ın doğru olduğunu kontrol edin.',
        'callback_ok' => ':name olarak test başarılı oldu — bu yönlendirme URL\'si Discord\'da doğru şekilde kayıtlı.',
    ],
];
