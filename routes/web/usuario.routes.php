<?php

use App\Http\Controllers\Usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::prefix('usuario')->name('usuario.')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('index');
    Route::post('/', [UsuarioController::class, 'store'])->name('cadastrar');
});
