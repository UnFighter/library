<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use App\Services\User\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected Service $service;
    protected int $perPage = 10;
    public function __construct(Service $service)
    {
        $this->service = $service; // Инициализация свойства в конструкторе
    }
    public function index(): Factory|View|Application
    {
        $users = User::paginate($this->perPage);
        return view('user.index', compact('users'));
    }
    public function edit(User $user): Factory|View|Application
    {
        return view('user.edit', compact('user'));
    }
    public function show(User $user): Factory|View|Application
    {
        $user->load('books');
        return view('user.show', compact('user'));
    }
    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('user.index')->with('success', 'Пользователь успешно создан.');
    }
    public function create(User $user): Factory|View|Application
    {
        return view('user.create',compact('user'));
    }
    public function update(UpdateRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        $this->service->update($user, $data);
        return redirect()->route('user.index')->with('success', 'Пользователь успешно обновлен.');;
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
}
