<?php

namespace App\Http\Controllers\UserBook;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class CreateRelationController
{
    public function createBookUserConnection(User $user, Book $book): RedirectResponse
    {
        $user->books()->attach($book);
        $book->increment('amount', 1);
        return redirect()->back();
    }

}
