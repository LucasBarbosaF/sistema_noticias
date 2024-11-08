<?php

use App\Http\Controllers\Autenticacao\LoginController;
use App\Http\Controllers\Autenticacao\LogoutController;
use Illuminate\Support\Facades\Route;

Route::prefix('autenticacao')->name('autenticacao.')->group(function () {
    Route::prefix('login')->name('login.')->group(function () {
        Route::get('/', [LoginController::class, 'index'])->name('index');
        Route::post('/', [LoginController::class, 'logar'])->name('logar');
    });
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
