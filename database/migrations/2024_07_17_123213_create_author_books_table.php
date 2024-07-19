<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('author_book', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('book_id');

            $table->index('author_id', 'author_book_author_idx');
            $table->index('book_id', 'author_book_book_idx');

            $table->foreign('author_id', 'author_book_author_fk')->on('authors')->references('id');
            $table->foreign('book_id', 'author_book_book_fk')->on('books')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_author');
    }
};
