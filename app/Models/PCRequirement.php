<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCRequirement extends Model
{
    use HasFactory;

    protected $table = 'pc_requirements';

    protected $fillable = ['id','game_id','minimum','recommended'];

}
