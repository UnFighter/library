<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Pages\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class BookController extends Controller
{
    public function index(): Factory|View|Application
    {
        $books = Book::paginate(10);
        return view('book.index', compact('books'));
    }

    public function search(Request $request): Factory|View|Application
    {
        $search = $request->input('search');
        if ($search) {
            $books = Book::where('title', 'LIKE', "%{$search}%")
                ->orWhereHas('authors', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })
                ->get();
        } else {
            $books = collect();
        }

        return view('book.index', compact('books'));
    }
}
