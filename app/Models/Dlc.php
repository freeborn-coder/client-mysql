<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dlc extends Model
{
    use HasFactory;

    protected $fillable = ['id','game_id','dlc_number'];

}
