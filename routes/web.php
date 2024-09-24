<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BookController::class);

Route::resource('users', UserController::class); //users
Route::delete('/{user}/book/{book}/destroy-link', [BookController::class, 'destroyBookUserLink'])->name('usersDestroyLink');
Route::post('/{user}/book/{book}/create-link', [BookController::class, 'createBookUserLink'])->name('usersCreateLink');

Route::view('/', 'pages.main')->name('main.index');
Route::view('/about', 'pages.about')->name('about.index');
Route::view('/contact', 'pages.contacts')->name('contact.index');
