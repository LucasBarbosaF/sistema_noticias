<?php

use App\Http\Controllers\Categoria\CategoriaController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CategoriaController::class, 'index'])->name('categoria.index');
Route::prefix('categoria')->name('categoria.')->group(function () {
    Route::get('{categoria}', [CategoriaController::class, 'show'])->name('show');
    Route::get('create/form', [CategoriaController::class, 'create'])->middleware('auth')->name('create');
    Route::post('create/form', [CategoriaController::class, 'store'])->middleware('auth')->name('store');
    Route::get('atualizar/{categoria}', [CategoriaController::class, 'edit'])->middleware('auth')->name('atualizar');
    Route::post('atualizar/{categoria}', [CategoriaController::class, 'update'])->middleware('auth')->name('update');
});

//});
