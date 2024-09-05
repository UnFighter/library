<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class BookController extends Controller
{
    public function index(): Factory|View|Application
    {
        $books = Book::paginate(7);
        return view('book.index', compact('books'));
    }
}
