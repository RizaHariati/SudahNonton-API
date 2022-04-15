<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvShow extends Model
{
  use HasFactory;

  protected $fillable = [
    'tv_id',
    'name',
    'image',
    'genres',
    'tagline',
    'number_of_seasons',
    'overview',
    'is_favorite',
    'my_comment'
  ];
}
