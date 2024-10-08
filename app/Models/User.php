<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    public $table = 'users';
    protected $fillable = ['name', 'email'];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
