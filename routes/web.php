<?php

use Azuriom\Plugin\DiscordLogin\Controllers\DiscordLoginController;
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

// Not guest-only: an authenticated admin needs to reach this to test the
// callback (see DiscordLoginController::callback()). Already-authenticated,
// non-test visits are redirected away from inside the controller instead.
Route::get('/callback', [DiscordLoginController::class, 'callback'])
    ->name('callback')
    ->middleware('throttle:6,1');

Route::middleware('guest')->group(function () {
    Route::get('/redirect', [DiscordLoginController::class, 'redirect'])->name('redirect');

    Route::get('/choose', [DiscordLoginController::class, 'showChoose'])->name('choose.show');
    Route::post('/choose', [DiscordLoginController::class, 'chooseAccount'])->name('choose');

    Route::get('/conflict', [DiscordLoginController::class, 'showConflict'])->name('conflict.show');
    Route::post('/conflict/login', [DiscordLoginController::class, 'conflictLogin'])->name('conflict.login');
    Route::post('/conflict/register', [DiscordLoginController::class, 'conflictRegister'])->name('conflict.register');

    Route::get('/register', [DiscordLoginController::class, 'showRegister'])->name('register.show');

    Route::post('/register', [DiscordLoginController::class, 'register'])
        ->name('register')
        ->middleware('captcha');
});

Route::middleware('auth')->group(function () {
    Route::post('/bypass-2fa', [DiscordLoginController::class, 'toggleBypass2fa'])->name('bypass-2fa');
    Route::post('/set-password', [DiscordLoginController::class, 'setPassword'])->name('set-password');

    Route::get('/confirm', [DiscordLoginController::class, 'redirectConfirm'])->name('confirm');

    Route::get('/confirm/callback', [DiscordLoginController::class, 'confirmCallback'])
        ->name('confirm.callback')
        ->middleware('throttle:6,1');
});
