<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    use HasFactory;

    protected  $fillable = [
        'greenhouse_id',
        'modality_id',
        'name',
        'ip_address',
    ];


    public function modality() {
        return $this->hasOne(Modality::class);
    }
}
