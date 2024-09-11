<?php

namespace App\Http\Controllers\UserBook;

use App\Http\Controllers\Pages\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class DestroyRelationController extends Controller
{
    public function destroyBookUserConnection(User $user, Book $book): RedirectResponse
    {
        $user->books()->detach($book);
        $book->increment('amount', 1);
        return redirect()->back();
    }
}
