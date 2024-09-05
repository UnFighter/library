<?php

namespace App\Http\Controllers\Book;

use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    public function update(UpdateRequest $request, Book $book): RedirectResponse
    {
        $data = $request->validated();
        $this->service->update($book, $data);
        return redirect()->route('book.index', $book->id);
    }
}
