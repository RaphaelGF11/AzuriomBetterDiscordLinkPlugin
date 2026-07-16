<?php

return [
    'navbar' => 'Discord Login',

    'duplicate' => 'Akun Discord ini sudah terhubung dengan akun lain.',
    'email_mismatch' => 'Login berhasil. Peringatan: alamat email akun Discord Anda tidak cocok dengan alamat email akun Anda.',
    'password_login_disabled' => 'Akun ini belum memiliki kata sandi: silakan masuk menggunakan Discord.',
    'guild_required' => 'Anda perlu bergabung dengan server Discord kami sebelum dapat masuk atau mendaftar dengan Discord.',
    'guild_notice' => 'Anda perlu bergabung dengan server Discord kami untuk menautkan akun Anda.',

    'login' => [
        'button' => 'Masuk dengan Discord',
    ],

    'register' => [
        'button' => 'Daftar dengan Discord',
        'title' => 'Lengkapi pendaftaran Anda',
        'not_found' => 'Belum ada akun yang terhubung ke Discord ini. Lengkapi informasi di bawah untuk membuat akun Anda.',
        'duplicate_notice' => 'Akun Discord ini sudah terhubung dengan akun lain, tetapi Anda tetap memilih untuk membuat akun baru. Lengkapi informasi di bawah.',
        'email_help' => 'Email akun Discord Anda, digunakan untuk akun Anda.',
        'password_optional' => 'Kata sandi (opsional)',
        'password_help' => 'Jika Anda tidak menetapkan kata sandi, Anda hanya dapat masuk melalui Discord (Anda dapat menetapkannya nanti dari profil Anda).',
        'submit' => 'Buat akun saya',
        'email_used' => 'Alamat email ini sudah digunakan oleh akun lain.',
    ],

    'choose' => [
        'title' => 'Beberapa akun terhubung ke Discord ini',
        'description' => 'Pilih akun mana yang ingin Anda gunakan untuk masuk.',
    ],

    'conflict' => [
        'title' => 'Discord ini sudah terhubung',
        'already_linked' => 'Akun Discord ini sudah terhubung dengan akun yang ada di situs ini. Anda dapat masuk ke akun tersebut, atau membuat akun baru jika duplikat diizinkan.',
        'login' => 'Masuk ke akun yang sudah ada',
        'register' => 'Tetap buat akun baru',
    ],

    'confirm' => [
        'description' => 'Akun Anda tidak memiliki kata sandi: konfirmasi identitas Anda dengan masuk kembali ke Discord.',
        'button' => 'Konfirmasi dengan Discord',
        'mismatch' => 'Ini bukan akun Discord yang terhubung dengan profil Anda.',
    ],

    'profile' => [
        'title' => 'Discord Login',
        'linked_as' => 'Login Discord terhubung dengan :name.',
        'bypass_2fa' => 'Izinkan login Discord melewati autentikasi dua faktor',
        'no_password' => 'Akun Anda belum memiliki kata sandi. Anda dapat membuatnya di sini agar juga dapat masuk tanpa Discord.',
        'set_password' => 'Tetapkan kata sandi',
        'unlink_locked' => 'Anda harus menetapkan kata sandi terlebih dahulu sebelum memutuskan tautan akun Discord Anda, jika tidak Anda tidak akan bisa lagi masuk ke akun Anda.',
    ],

    'tools' => [
        'recovery_dm' => "Hai! Seorang admin :site membuat kata sandi baru untuk akun Anda:\n\n:password\n\nAnda akan diminta untuk mengubahnya pada login berikutnya dengan kata sandi ini.",
        'recovery_codes_dm' => "Hai! Seorang admin :site membuat ulang kode pemulihan autentikasi dua faktor Anda. Kode Anda sebelumnya tidak berfungsi lagi. Berikut kode baru Anda - simpan di tempat yang aman:\n\n:codes",
    ],
];
