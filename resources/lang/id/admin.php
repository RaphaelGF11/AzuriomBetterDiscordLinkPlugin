<?php

return [
    'permission' => 'Kelola pengaturan login Discord',
    'allow_duplicates' => 'Izinkan tautan Discord duplikat',
    'allow_duplicates_help' => 'Jika diaktifkan, akun Discord yang sama dapat ditautkan ke beberapa akun situs; saat login, pengguna akan memilih akun mana yang ingin digunakan untuk masuk. Jika dinonaktifkan, penautan ditolak jika Discord tersebut sudah ditautkan ke akun lain.',
    'allow_passwordless' => 'Izinkan pembuatan akun tanpa kata sandi',
    'allow_passwordless_help' => 'Jika diaktifkan, kata sandi bersifat opsional saat mendaftar dengan Discord (akun tersebut hanya dapat masuk melalui Discord, sampai kata sandi ditetapkan dari profil). Jika dinonaktifkan, kata sandi diperlukan untuk membuat akun dengan Discord.',
    'http_warning' => 'Situs ini dimuat melalui HTTP (tidak aman). Discord hanya menerima URL redirect HTTPS, kecuali untuk pengecualian localhost/127.0.0.1 untuk pengembangan lokal. Callback akan gagal sampai situs dilayani melalui HTTPS.',
    'custom_credentials' => 'Gunakan kredensial Discord khusus',
    'custom_credentials_help' => 'Jika diaktifkan, plugin ini akan menggunakan client ID / secret di bawah, bukan yang dikonfigurasi di manajemen peran. URL redirect yang tercantum di atas kemudian harus ditambahkan ke aplikasi Discord khusus tersebut.',
    'bot_token' => 'Token bot',
    'bot_token_help' => 'Token bot Discord yang diundang ke server Anda dengan izin "Kelola Peran" dan "Buat Undangan Instan". Diperlukan untuk alat admin Discord, sinkronisasi peran, dan opsi "Batasi ke anggota server" di bawah - opsional jika tidak.',
    'bot_token_shared_help' => 'Saat ini menggunakan kembali token bot yang sudah dikonfigurasi di halaman Manajemen Peran &rarr; Tautkan peran dengan Discord. Aktifkan "Gunakan kredensial Discord khusus" di atas untuk menggunakan bot yang berbeda.',
    'customizable_email' => 'Izinkan email pendaftaran yang dapat disesuaikan',
    'customizable_email_help' => 'Jika diaktifkan, pengguna dapat memilih alamat email yang berbeda dari email Discord mereka saat menyelesaikan pendaftaran, alih-alih terkunci pada email Discord. Tidak dapat diaktifkan bersamaan dengan "Cocokkan akun berdasarkan alamat email".',
    'match_by_email' => 'Cocokkan akun berdasarkan alamat email',
    'match_by_email_help' => 'Jika diaktifkan, ketika tidak ada akun yang ditautkan ke Discord tersebut, login akan mencoba menemukan akun situs yang alamat emailnya cocok dengan email Discord (yang terverifikasi). Tautan eksplisit selalu diprioritaskan.',
    'incompatible_with_match_by_email' => 'Pengaturan ini tidak dapat diaktifkan bersamaan dengan ":option".',
    'sync_avatar' => 'Sinkronkan avatar dengan Discord',
    'sync_avatar_help' => 'Jika diaktifkan, avatar situs pengguna akan diatur ke avatar Discord mereka setiap kali login/pendaftaran, dan setiap kali admin menggunakan "Perbarui info Discord" di bawah.',
    'required_guild' => 'Batasi ke anggota server',
    'required_guild_help' => 'Jika ID server ditetapkan, login atau pendaftaran dengan Discord memerlukan keanggotaan di server tersebut - pengguna akan otomatis ditambahkan (persetujuan mereka untuk izin "guilds.join" diminta oleh Discord sendiri, di layar otorisasi) jika mereka belum menjadi anggota. Memerlukan token bot di atas, yang diundang ke server tersebut dengan izin "Buat Undangan Instan". Biarkan ID server kosong untuk menonaktifkan pembatasan ini.',
    'required_guild_id' => 'ID Server',
    'bypass_maintenance' => 'Izinkan login Discord selama pemeliharaan',
    'bypass_maintenance_help' => 'Jika diaktifkan, login dengan Discord tetap memungkinkan bahkan saat mode pemeliharaan aktif, tanpa memerlukan izin akses pemeliharaan. Jika dinonaktifkan, berlaku aturan yang sama seperti login klasik.',

    'users' => [
        'no_password_warning' => 'Akun ini belum memiliki kata sandi. Saat ini hanya dapat masuk melalui Discord. Menetapkan kata sandi di bawah ini juga akan mengaktifkan login kata sandi klasik.',
        'no_password_error' => 'Akun ini belum memiliki kata sandi. Saat ini sama sekali tidak dapat masuk. Menetapkan kata sandi di bawah akan mengaktifkan login kata sandi klasik.',
    ],

    'force_unlink' => [
        'button' => 'Putuskan tautan (mengunci akun)',
        'title' => 'Putuskan tautan akun Discord tanpa kata sandi ini?',
        'warning' => 'Tautan Discord ini saat ini adalah satu-satunya cara akun ini untuk masuk. Memutuskan tautannya akan mengunci akun sampai diberi kata sandi di bawah - ini tidak dilakukan secara otomatis.',
        'confirm' => 'Tetap putuskan tautan',
    ],

    'tools' => [
        'title' => 'Alat Discord',
        'bot_unavailable' => 'Konfigurasikan token bot di pengaturan plugin untuk membuka pengiriman DM, kata sandi pemulihan, atau kode pemulihan 2FA.',

        'dm' => [
            'button' => 'Kirim DM',
            'title' => 'Kirim DM Discord',
            'content_label' => 'Pesan',
            'confirm' => 'Kirim',
            'sent' => 'Pesan telah dikirim.',
            'failed' => 'Tidak dapat mengirim pesan - bot dan pengguna ini mungkin tidak berada di server yang sama, atau pengguna mungkin telah menonaktifkan DM.',
        ],

        'recovery_password' => [
            'button' => 'Kirim kata sandi pemulihan',
            'title' => 'Kirim kata sandi pemulihan',
            'warning' => 'Ini akan menghasilkan kata sandi acak baru, memaksa perubahan pada login berikutnya, dan mengirimkannya ke pengguna melalui DM Discord.',
            'invalidate_sessions' => 'Juga keluarkan dari semua sesi yang sedang terbuka',
            'invalidate_sessions_help' => 'Memperbarui token "ingat saya", dan juga langsung menghapus sesi pengguna jika situs menggunakan driver sesi database. Dengan driver sesi lain, sesi yang sudah terbuka dapat tetap masuk sampai kedaluwarsa dengan sendirinya.',
            'confirm' => 'Kirim',
            'sent' => 'Kata sandi pemulihan telah dibuat dan dikirim.',
        ],

        'refresh' => [
            'button' => 'Perbarui info Discord',
            'title' => 'Perbarui info Discord',
            'description' => 'Mengambil nama pengguna Discord terkini pengguna ini (dan avatar, jika sinkronisasi avatar diaktifkan) dari Discord, jika ia mengubahnya di sana.',
            'confirm' => 'Perbarui',
            'done' => 'Info Discord telah diperbarui.',
            'failed' => 'Tidak dapat menghubungi Discord untuk memperbarui info akun ini.',
        ],

        'recovery_codes' => [
            'button' => 'Kirim kode pemulihan 2FA',
            'title' => 'Kirim kode pemulihan 2FA',
            'warning' => 'Ini akan mengganti kode pemulihan dua faktor pengguna yang ada dengan set baru, dan mengirimkannya melalui DM Discord. Kode lama langsung berhenti berfungsi.',
            'confirm' => 'Kirim',
            'sent' => 'Kode pemulihan baru telah dibuat dan dikirim.',
        ],
    ],

    'role_sync' => [
        'title' => 'Sinkronisasi peran Discord',
        'description' => 'Secara otomatis memberikan peran server Discord kepada pengguna yang memenuhi kondisi suatu aturan, dan menghapusnya begitu mereka tidak lagi memenuhinya (diperiksa secara real-time saat perubahan yang relevan, dan pada jadwal untuk juga menangkap hal-hal seperti langganan yang kedaluwarsa).',
        'bot_unavailable' => 'Konfigurasikan token bot di pengaturan di atas untuk membuka sinkronisasi peran Discord.',
        'create' => 'Buat aturan',
        'edit' => 'Edit aturan',
        'empty' => 'Belum ada aturan sinkronisasi.',
        'guild_id' => 'ID Server',
        'role_id' => 'ID Peran',
        'conditions' => 'Kondisi',
        'condition_site_roles' => 'Peran situs: :roles',
        'condition_shop_package' => 'Memiliki paket: :package',
        'condition_balance' => 'Saldo antara :min dan :max',
        'no_conditions' => 'Tidak ada (berlaku untuk semua orang)',
        'conditions_title' => 'Kondisi',
        'conditions_help' => 'Semua kondisi yang ditetapkan di bawah harus terpenuhi bersamaan agar aturan ini memberikan perannya. Biarkan kondisi kosong/tidak dipilih untuk tidak memeriksanya. Beberapa aturan dapat menargetkan peran server yang sama: memenuhi salah satunya sudah cukup untuk mendapatkannya.',
        'condition_site_roles_label' => 'Batasi ke peran situs tertentu',
        'condition_site_roles_help' => 'Biarkan semua kotak centang tidak dicentang untuk tidak memeriksa kondisi ini.',
        'condition_shop_package_label' => 'Memerlukan kepemilikan paket toko ini',
        'no_condition' => 'Jangan periksa kondisi ini',
        'balance_min' => 'Saldo minimum',
        'balance_max' => 'Saldo maksimum',
        'discord_role_title' => 'Peran Discord yang akan diberikan',
    ],

    'email_warning' => [
        'title' => 'Peringatan keamanan',
        'body' => 'Mencocokkan akun berdasarkan alamat email kurang aman dibandingkan berdasarkan ID Discord: siapa pun yang menguasai alamat email terverifikasi di Discord akan dapat masuk ke akun situs dengan alamat tersebut, tanpa pernah ada penautan yang dibuat. Jika akun email disusupi atau digunakan kembali, akun situs pun demikian. Aktifkan opsi ini hanya jika Anda memahami risiko ini.',
        'confirm' => 'Saya memahami risikonya',
    ],

    'info' => [
        'setup' => 'Plugin ini menggunakan kembali aplikasi Discord yang dikonfigurasi di <a href=":url">Manajemen Peran &rarr; Tautkan peran dengan Discord</a> (client ID / client secret). Siapkan terlebih dahulu di sana jika belum.',
        'redirect_intro' => 'Di <b>portal pengembang Discord</b>, pada bagian <b>OAuth2</b> &rarr; <b>General</b>, tambahkan juga URL ini ke <b>Redirects</b> (selain URL tautan profil):',
    ],

    'test' => [
        'title' => 'Uji konfigurasi',
        'description' => 'Periksa apakah client ID/secret valid, lalu jalankan login uji coba sungguhan untuk memastikan URL redirect benar-benar terdaftar di Discord (ini satu-satunya cara yang andal untuk memeriksa: Discord hanya memvalidasinya di layar otorisasi, bukan sebelumnya).',
        'credentials_button' => 'Periksa client ID / secret',
        'bot_token_button' => 'Periksa token bot',
        'bot_token_ok' => 'Token bot valid.',
        'bot_token_invalid' => 'Token bot hilang atau salah.',
        'callback_button_login' => 'Uji callback login',
        'callback_button_confirm' => 'Uji callback konfirmasi',
        'callback_help' => 'Tombol-tombol ini benar-benar mengarahkan Anda ke Discord, menggunakan kedua URL yang tercantum di atas. Jika Anda kembali ke halaman ini dengan pesan berhasil, itu mengonfirmasi bahwa URL yang diuji sudah terdaftar. Jika Discord menampilkan error "invalid redirect_uri" bahkan sebelum meminta Anda masuk, URL tersebut hilang atau salah.',
        'not_configured' => 'Belum ada client ID / secret Discord yang dikonfigurasi. Siapkan terlebih dahulu di manajemen peran.',
        'network_error' => 'Tidak dapat menjangkau API Discord. Coba lagi nanti.',
        'credentials_invalid' => 'Client ID atau client secret salah.',
        'credentials_ok' => 'Client ID dan client secret valid.',
        'callback_failed' => 'Pengujian gagal. Periksa apakah URL redirect yang diuji terdaftar di Discord dan client secret sudah benar.',
        'callback_ok' => 'Pengujian berhasil sebagai :name — URL redirect tersebut terdaftar dengan benar di Discord.',
    ],
];
