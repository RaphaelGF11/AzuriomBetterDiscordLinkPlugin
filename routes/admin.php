<?php

use Azuriom\Plugin\DiscordIntegration\Controllers\Admin\AuthenticationController;
use Azuriom\Plugin\DiscordIntegration\Controllers\Admin\ConfigurationController;
use Azuriom\Plugin\DiscordIntegration\Controllers\Admin\RoleSyncController;
use Azuriom\Plugin\DiscordIntegration\Controllers\Admin\UserController;
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

Route::middleware('can:discord-integration.admin')->group(function () {
    Route::get('/configuration', [ConfigurationController::class, 'show'])->name('configuration');
    Route::post('/configuration', [ConfigurationController::class, 'save'])->name('configuration.save');

    Route::post('/configuration/test-credentials', [ConfigurationController::class, 'testCredentials'])
        ->name('configuration.test-credentials');

    Route::post('/configuration/test-bot-token', [ConfigurationController::class, 'testBotToken'])
        ->name('configuration.test-bot-token');

    Route::get('/configuration/test-callback', [ConfigurationController::class, 'testCallback'])
        ->name('configuration.test-callback');

    Route::get('/authentication', [AuthenticationController::class, 'show'])->name('authentication');
    Route::post('/authentication', [AuthenticationController::class, 'save'])->name('authentication.save');

    Route::get('/roles', [RoleSyncController::class, 'index'])->name('roles');
    Route::post('/roles', [RoleSyncController::class, 'store'])->name('roles.store');
    Route::put('/roles/{roleSync}', [RoleSyncController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{roleSync}', [RoleSyncController::class, 'destroy'])->name('roles.destroy');

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
});
