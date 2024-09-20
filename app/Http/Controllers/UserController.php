<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\StoreRequest;
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

    public function index(Request $request): Factory|View|Application
    {
        $search = $request->input('search');

        if ($search) {
            $users = User::where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->paginate($this->perPage);
        } else {
            $users = User::paginate($this->perPage);
        }

        return view('user.index', compact('users'));
    }

    public function edit(User $user): Factory|View|Application
    {
        return view('user.edit', compact('user'));
    }

    public function show(Request $request, User $user): Factory|View|Application
    {
        $user->load('books');

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
        return view('user.show', compact('user','books', 'search'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        User::query()->create($data);

        return redirect()->route('user.index');
    }

    public function create(User $user): Factory|View|Application
    {
        return view('user.create', compact('user'));
    }

    public function update(UpdateRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('user.index');
    }

    public function destroyUser(User $user): RedirectResponse
    {
        $user->books()->detach();
        $user->delete();
        return redirect()->route('user.index');
    }
}
