<?php

use Azuriom\Plugin\DiscordLogin\Controllers\Admin\RoleSyncController;
use Azuriom\Plugin\DiscordLogin\Controllers\Admin\SettingsController;
use Azuriom\Plugin\DiscordLogin\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "admin-access" middleware and your plugin
| name as prefix.
|
*/

Route::middleware('can:discord-login.admin')->group(function () {
    Route::get('/settings', [SettingsController::class, 'show'])->name('settings');
    Route::post('/settings', [SettingsController::class, 'save'])->name('settings.save');

    Route::post('/settings/test-credentials', [SettingsController::class, 'testCredentials'])
        ->name('settings.test-credentials');

    Route::post('/settings/test-bot-token', [SettingsController::class, 'testBotToken'])
        ->name('settings.test-bot-token');

    Route::get('/settings/test-callback', [SettingsController::class, 'testCallback'])
        ->name('settings.test-callback');

    Route::post('/users/{user}/force-unlink', [UserController::class, 'forceUnlinkDiscord'])
        ->name('users.force-unlink')
        ->middleware('captcha');

    Route::post('/users/{user}/send-dm', [UserController::class, 'sendDirectMessage'])
        ->name('users.send-dm')
        ->middleware('captcha');

    Route::post('/users/{user}/send-recovery-password', [UserController::class, 'sendRecoveryPassword'])
        ->name('users.send-recovery-password')
        ->middleware('captcha');

    Route::post('/users/{user}/refresh-discord-info', [UserController::class, 'refreshDiscordInfo'])
        ->name('users.refresh-discord-info')
        ->middleware('captcha');

    Route::post('/users/{user}/send-2fa-recovery-codes', [UserController::class, 'send2faRecoveryCodes'])
        ->name('users.send-2fa-recovery-codes')
        ->middleware('captcha');

    Route::post('/role-sync', [RoleSyncController::class, 'store'])->name('role-sync.store');
    Route::put('/role-sync/{roleSync}', [RoleSyncController::class, 'update'])->name('role-sync.update');
    Route::delete('/role-sync/{roleSync}', [RoleSyncController::class, 'destroy'])->name('role-sync.destroy');
});
