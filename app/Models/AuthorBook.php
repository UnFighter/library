<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    use HasFactory;
    public $table = 'author_book';
    protected $fillable = ['author_id', 'book_id'];

}
