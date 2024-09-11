<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Pages\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ShowController extends Controller
{
    public function show(User $user): Factory|View|Application
    {
        $user->load('books');
        return view('user.show', compact('user'));
    }

    public function search(Request $request, User $user): Factory|View|Application
    {
        $search = $request->input('search');

        // Загружаем книги пользователя
        $user->load('books');

        if ($search) {
            $books = Book::where('title', 'LIKE', "%{$search}%")
                ->orWhereHas('authors', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })

                ->get();
        } else {
            $books = collect();
        }

        // Передаем как книги, так и пользователя в представление
        return view('user.show', compact('user', 'books', 'search'));
    }
}
