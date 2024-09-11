<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class BookUserRelationController
{
    public function createBookUserConnection(User $user, Book $book): RedirectResponse
    {
        $user->books()->attach($book);
        $book->increment('amount', 1);
        return redirect()->back();
    }

    public function destroyBookUserConnection(User $user, Book $book): RedirectResponse
    {
        $user->books()->detach($book);
        $book->increment('amount', 1);
        return redirect()->back();
    }
}
