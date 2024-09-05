<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');

            $table->index('user_id', 'user_book_user_idx');
            $table->index('book_id', 'user_book_book_idx');

            $table->foreign('user_id', 'user_book_user_fk')->on('users')->references('id');
            $table->foreign('book_id', 'user_book_book_fk')->on('books')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_user');
    }
};
