<?php

namespace App\Http\Controllers\Book;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class EditController extends BaseController
{
    public function edit(Book $book): Factory|View|Application
    {
        $authors = Author::all();
        return view('book.edit', compact('book', 'authors'));
    }
}
