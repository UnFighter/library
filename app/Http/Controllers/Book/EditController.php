<?php

namespace App\Http\Controllers\Book;

use App\Models\Author;
use App\Models\Book;

class EditController extends BaseController
{
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('book.edit', compact('book', 'authors'));
    }
}
