<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ShowController extends BaseController
{
    public function show(Book $book): Factory|View|Application
    {
        $book->load('authors');
        return view('book.show', compact('book'));
    }
}
