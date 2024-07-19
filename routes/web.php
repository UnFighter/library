<?php

declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Маршруты ответвечающие контроллеры страниц
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/library', [BookController::class, 'index'])->name('book.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// Маршруты для работы с библиотекой
Route::get('/library/create', [BookController::class, 'create'])->name('create.index');
Route::post('/library', [BookController::class, 'store'])->name('book.store');
Route::get('/library/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/library/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::patch('/library/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/library/{book}', [BookController::class, 'destroy'])->name('book.destroy');

Route::get('/library/delete', [BookController::class, 'delete']);
