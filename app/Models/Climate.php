<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Climate extends Model
{
    use HasFactory;

    protected $fillable = [
        'greenhouse_id',
        'bot_id',
        'temperature',
        'air_humidity',
        'soil_humidity'
    ];
}
