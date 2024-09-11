<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Pages\Controller;
use App\Models\Book;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $perPage = 10; // Пагинация
    public function index(): Factory|View|Application
    {
        $books = Book::paginate($this->perPage);
        return view('book.index', compact('books'));
    }

    public function search(Request $request): Factory|View|Application
    {
        $search = $request->input('search');
        if ($search) {
            $books = Book::where('title', 'LIKE', "%$search%")
                ->orWhereHas('authors', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
                ->paginate($this->perPage);
        } else {
            $books = collect();
        }

        return view('book.index', compact('books'));
    }
}
