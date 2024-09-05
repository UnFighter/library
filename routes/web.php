<?php

declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Book\CreateController;
use App\Http\Controllers\Book\DeleteController;
use App\Http\Controllers\Book\DestroyController;
use App\Http\Controllers\Book\EditController;
use App\Http\Controllers\Book\ShowController;
use App\Http\Controllers\Book\StoreController;
use App\Http\Controllers\Book\UpdateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\User\DestroyBookController;
use App\Http\Controllers\User\DestroyUserRelation;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Маршруты для работы с библиотекой
Route::group(['namespace' => 'App\Http\Controllers\Book'], function(){
Route::get('/library', [BookController::class, 'index'])->name('book.index');
Route::get('/library/create', [CreateController::class, 'create'])->name('book.create');
Route::post('/library', [StoreController::class, 'store'])->name('book.store');
Route::get('/library/{book}', [ShowController::class, 'show'])->name('book.show');
Route::get('/library/{book}/edit', [EditController::class, 'edit'])->name('book.edit');
Route::patch('/library/{book}', [UpdateController::class, 'update'])->name('book.update');
Route::delete('/library/{book}', [DestroyController::class, 'destroy'])->name('book.destroy');
Route::get('/library/delete', [DeleteController::class, 'delete']);
});

// Маршруты страниц пользователя
Route::group(['namespace' => 'App\Http\Controllers\User'], function (){
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{user}', [\App\Http\Controllers\User\ShowController::class, 'show'])->name('user.show');
   /* Route::delete('/user/{user}', [DestroyBookController::class, 'destroyUser'])->name('user.destroy');*/
    Route::delete('/user/{user}/connection', [DestroyUserRelation::class, 'destroyConnection'])->name('user.destroyConnection');
});

// Маршруты сайта
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
