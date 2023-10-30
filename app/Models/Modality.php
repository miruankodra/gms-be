<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    use HasFactory;

    protected $table = 'modalities';

    protected $fillable = [
        'greenhouse_id',
        'bot_id',
        'name',
        'description',
        'max_temperature',
        'min_temperature',
        'max_air_humidity',
        'min_air_humidity',
        'max_soil_humidity',
        'min_soil_humidity',
        'enabled',
    ];

//    protected $casts = [
//        'enabled' =>
//

    public function bot() {
        return $this->belongsTo(Bot::class);
    }
}
