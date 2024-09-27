<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        return view('users.index', compact('users'));
    }

    public function edit(User $user): Factory|View|Application
    {
        return view('users.edit', compact('user'));
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
        return view('users.show', compact('user', 'books', 'search'));
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            User::query()->create($data);
        } catch (\Exception $e) {
            Log::error('Ошибка при добавлении пользователя: ' . $e->getMessage());
            return back()->with(['error' => 'Не удалось добавить пользователя. Попробуйте снова.']);
        }
        return redirect()->route('users.index');
    }

    public function create(): Factory|View|Application
    {
        return view('users.create');
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        try {
            $data = $request->validated();
            $user->update($data);
        } catch (\Exception $e) {
            Log::error('Ошибка при обновлении пользователя: ' . $e->getMessage());
            return back()->with(['error' => 'Не удалось обновить пользователя. Попробуйте снова.']);
        }
        return redirect()->route('users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->books()->detach();
        $user->delete();
        return redirect()->route('users.index');
    }
}
