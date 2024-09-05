<?php

namespace App\Services\Book;

use App\Models\Book;

class Service
{
    public function store($data): void
    {
        $authors = $data['authors'];
        unset($data['authors']);

        $book = Book::query()->create($data);
        $book->authors()->attach($authors);
    }

    public function update($book, $data): void
    {
        $authors = $data['authors'];
        unset($data['authors']);

        $book->update($data);
        $book->authors()->sync($authors);
    }
}
