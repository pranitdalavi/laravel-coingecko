<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coingecko extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'coingeckoid', 'symbol', 'name', 'platforms'];
}
