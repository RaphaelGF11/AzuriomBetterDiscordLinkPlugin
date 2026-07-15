<?php

use Azuriom\Plugin\DiscordLogin\Controllers\Admin\SettingsController;
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

    Route::get('/settings/test-callback', [SettingsController::class, 'testCallback'])
        ->name('settings.test-callback');
});
