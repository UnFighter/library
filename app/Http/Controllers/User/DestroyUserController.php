<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Pages\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class DestroyUserController extends Controller
{
    public function destroyUser(User $user): RedirectResponse
    {
        $user->books()->detach();
        $user->delete();
        return redirect()->route('user.index');
    }
}
