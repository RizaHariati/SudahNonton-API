<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'title',
        'image',
        'genres',
        'tagline',
        'release_date',
        'overview',
        'is_favorite',
        'my_comment'
    ];
}
