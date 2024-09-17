<?php

declare(strict_types=1);

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookUserRelationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Маршруты для работы с библиотекой
Route::get('/library', [BookController::class, 'index'])->name('book.index');
Route::get('/book/search', [BookController::class, 'searchBook'])->name('book.search');
Route::get('/library/create', [BookController::class, 'create'])->name('book.create');
Route::post('/library', [BookController::class, 'store'])->name('book.store');
Route::get('/library/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/library/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::patch('/library/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/library/{book}', [BookController::class, 'destroy'])->name('book.destroy');

// Маршруты страниц пользователя
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/search', [UserController::class, 'searchUser'])->name('user.search');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/{user}/search', [BookController::class, 'searchBookForUser'])->name('user.book-search');
Route::delete('/user/{user}', [UserController::class, 'destroyUser'])->name('user.destroy');

// Маршруты учёта книга
Route::delete('/user/{user}/book/{book}', [BookUserRelationController::class, 'destroyBookUserConnection'])->name('user.destroyConnection');
Route::post('/user/{user}/book/{book}/create', [BookUserRelationController::class, 'createBookUserConnection'])->name('user.createConnection');

// Маршруты сайта
Route::view('/', 'pages.main')->name('main.index');
Route::view('/about', 'pages.about')->name('about.index');
Route::view('/contact', 'pages.contacts')->name('contact.index');
