<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageSub extends Model
{
    use HasFactory;

    protected $fillable = ['id','package_id','package_group_id','price_in_cents_with_discount'];

}
