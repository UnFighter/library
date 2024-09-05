<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;

class DeleteController extends BaseController
{
    public function delete()
    {
        $book = Book::find(1);
        $book->delete();
    }
}
