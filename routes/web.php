<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/noticias', NoticiaController::class);
    Route::get('/noticias-data', [NoticiaController::class, 'getNoticias'])->name('noticias.data');
    Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
    Route::put('/noticias/{noticia}', [NoticiaController::class, 'update'])->name('noticias.update');
    Route::get('/noticias/{noticia}', [NoticiaController::class, 'show'])->name('noticias.show');
});

require __DIR__.'/auth.php';
