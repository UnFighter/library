<?php

declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Book\CreateController;
use App\Http\Controllers\Book\DeleteController;
use App\Http\Controllers\Book\DestroyController;
use App\Http\Controllers\Book\EditController;
use App\Http\Controllers\Book\IndexController;
use App\Http\Controllers\Book\ShowController;
use App\Http\Controllers\Book\StoreController;
use App\Http\Controllers\Book\UpdateController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Book'], function(){
    // Маршруты ответвечающие контроллеры страниц
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/library', [BookController::class, 'index'])->name('book.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// Маршруты для работы с библиотекой
Route::get('/library/create', [CreateController::class, 'create'])->name('create.index');
Route::post('/library', [StoreController::class, 'store'])->name('book.store');
Route::get('/library/{book}', [ShowController::class, 'show'])->name('book.show');
Route::get('/library/{book}/edit', [EditController::class, 'edit'])->name('book.edit');
Route::patch('/library/{book}', [UpdateController::class, 'update'])->name('book.update');
Route::delete('/library/{book}', [DestroyController::class, 'destroy'])->name('book.destroy');

Route::get('/library/delete', [DeleteController::class, 'delete']);
});

