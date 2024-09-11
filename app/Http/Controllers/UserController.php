<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected int $perPage = 10;

    public function index(): Factory|View|Application
    {
        $users = User::paginate($this->perPage);
        return view('user.index', compact('users'));
    }

    public function show(User $user): Factory|View|Application
    {
        $user->load('books');
        return view('user.show', compact('user'));
    }

    public function destroyUser(User $user): RedirectResponse
    {
        $user->books()->detach();
        $user->delete();
        return redirect()->route('user.index');
    }

    public function searchUser(Request $request): Factory|View|Application
    {
        $search = $request->input('search');

        if ($search) {
            $users = User::where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->paginate($this->perPage);
        } else {
            $users = collect();
        }

        return view('user.index', compact('users'));
    }

    public function searchBook(Request $request, User $user): Factory|View|Application
    {
        $search = $request->input('search');
        $user->load('books');

        if ($search) {
            $books = Book::where('title', 'LIKE', "%$search%")
                ->orWhereHas('authors', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
                ->get();
        } else {
            $books = collect();
        }
        return view('user.show', compact('user', 'books', 'search'));
    }
}
