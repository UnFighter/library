<?php

namespace App\Http\Controllers\Book;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    public function destroy(Book $book): RedirectResponse
    {
        $book->authors()->detach();
        $book->user()->detach();
        $book->delete();
        return redirect()->route('book.index');
    }
}
