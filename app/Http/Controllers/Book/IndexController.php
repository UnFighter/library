<?php

namespace App\Http\Controllers\Book;

use App\Models\Book;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class IndexController extends BaseController
{
    public function index(): Factory|View|Application
    {
        $books = Book::paginate(5);
        return view('book.index', compact('books'));
    }
}
