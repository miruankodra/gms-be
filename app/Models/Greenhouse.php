<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Greenhouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'city',
        'type',
        'area',
        'location',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function statistic(){
        return $this->hasMany(Statistic::class);
    }
}
