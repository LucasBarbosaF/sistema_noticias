<?php

use App\Http\Controllers\Noticia\NoticiaController;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth')->group(function () {
// Route::resource('noticias', NoticiaController::class)->except(['update', 'destroy', 'edit'])->names([
//     'index' => 'noticia.index',
//     'create' => 'noticia.create',
//     'store' => 'noticia.store',
//     'show' => 'noticia.show'
// ]);

Route::get('/', [NoticiaController::class, 'index'])->name('noticia.index');
Route::prefix('noticia')->name('noticia.')->group(function () {
    Route::get('{noticia}', [NoticiaController::class, 'show'])->name('show');
    Route::get('create/form', [NoticiaController::class, 'create'])->middleware('auth')->name('create');
    Route::post('create/form', [NoticiaController::class, 'store'])->middleware('auth')->name('store');
    Route::get('atualizar/{noticia}', [NoticiaController::class, 'edit'])->middleware('auth')->name('atualizar');
    Route::post('atualizar/{noticia}', [NoticiaController::class, 'update'])->middleware('auth')->name('update');
});

//});
