<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Pages\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class CreateController extends Controller
{
    public function create(Book $book): Factory|View|Application
    {
        $authors = Author::all();
        return view('book.create', compact('book', 'authors'));
    }
}
