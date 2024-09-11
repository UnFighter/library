<?php

declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookUserRelationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Маршруты для работы с библиотекой
Route::get('/library', [BookController::class, 'index'])->name('book.index');
Route::get('/book/search', [BookController::class, 'search'])->name('book.search');
Route::get('/library/create', [BookController::class, 'create'])->name('book.create');
Route::post('/library', [BookController::class, 'store'])->name('book.store');
Route::get('/library/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/library/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::patch('/library/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/library/{book}', [BookController::class, 'destroy'])->name('book.destroy');
Route::get('/library/delete', [BookController::class, 'delete']);

// Маршруты страниц пользователя
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/search', [UserController::class, 'searchUser'])->name('user.search');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{user}/search', [UserController::class, 'searchBook'])->name('user.book-search');
Route::delete('/user/{user}', [UserController::class, 'destroyUser'])->name('user.destroy');

// Маршруты учёта книга
Route::delete('/user/{user}/book/{book}', [BookUserRelationController::class, 'destroyBookUserConnection'])->name('user.destroyConnection');
Route::post('/user/{user}/book/{book}/create', [BookUserRelationController::class, 'createBookUserConnection'])->name('user.createConnection');

// Маршруты сайта
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
