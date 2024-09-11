<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Pages\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): Factory|View|Application
    {
        $users = User::paginate(10);
        return view('user.user', compact('users'));
    }

    public function search(Request $request): Factory|View|Application
    {
        $search = $request->input('search');

        if ($search) {
            $users = User::where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->get();
        } else {
            $users = collect();
        }

        return view('user.user', compact('users'));
    }

}
