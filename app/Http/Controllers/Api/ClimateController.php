<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Climate;
use Illuminate\Http\Request;

class ClimateController extends Controller
{
    public function getClimate($greenhouse_id){
        $climate = Climate::where('greenhouse_id', '=', $greenhouse_id)->latest()->first();

        return response()->successResponse($climate);
    }
}
