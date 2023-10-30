<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    protected $fillable = [
        'rank',
        'name',
        'symbol',
        'slug',
        'is_active',
        'first_historical_data',
        'last_historical_data',
        'platform'
    ];

}
