<?php

use Azuriom\Plugin\DiscordIntegration\Controllers\DiscordIntegrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

// Not guest-only, and shared by both the login/registration flow and the
// password-confirmation flow (see DiscordIntegrationController::callback()) -
// a single redirect_uri to register on Discord's side is simpler than two.
// Which flow applies, and whether the visitor needs to be a guest or
// authenticated, is sorted out from inside the controller instead.
Route::get('/callback', [DiscordIntegrationController::class, 'callback'])
    ->name('callback')
    ->middleware('throttle:6,1');

Route::middleware('guest')->group(function () {
    Route::get('/redirect', [DiscordIntegrationController::class, 'redirect'])->name('redirect');

    Route::get('/choose', [DiscordIntegrationController::class, 'showChoose'])->name('choose.show');
    Route::post('/choose', [DiscordIntegrationController::class, 'chooseAccount'])->name('choose');

    Route::get('/conflict', [DiscordIntegrationController::class, 'showConflict'])->name('conflict.show');
    Route::post('/conflict/login', [DiscordIntegrationController::class, 'conflictLogin'])->name('conflict.login');
    Route::post('/conflict/register', [DiscordIntegrationController::class, 'conflictRegister'])->name('conflict.register');

    Route::get('/register', [DiscordIntegrationController::class, 'showRegister'])->name('register.show');

    Route::post('/register', [DiscordIntegrationController::class, 'register'])
        ->name('register')
        ->middleware('captcha');
});

Route::middleware('auth')->group(function () {
    Route::post('/bypass-2fa', [DiscordIntegrationController::class, 'toggleBypass2fa'])->name('bypass-2fa');
    Route::post('/set-password', [DiscordIntegrationController::class, 'setPassword'])->name('set-password');

    Route::get('/confirm', [DiscordIntegrationController::class, 'redirectConfirm'])->name('confirm');
});
