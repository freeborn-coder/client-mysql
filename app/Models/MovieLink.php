<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieLink extends Model
{
    use HasFactory;

    protected $fillable = ['id','movie_id','format','link_480','link_max'];

}
