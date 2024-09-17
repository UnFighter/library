<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $books = Book::factory(10)->create();
        $authors = Author::factory(10)->create();
        $users = User::factory(10)->create();

        foreach ($books as $book) {
            $authorsId = $authors->random(1)->pluck('id');
            $book->authors()->attach($authorsId);
        }
        foreach ($users as $user) {
            $booksId = $books->random(3)->pluck('id');
            $user->books()->attach($booksId);
        }
    }
}
