<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Greenhouse;
use Illuminate\Http\Request;

class GreenhouseController extends Controller
{
    public function __construct()
    {
    }

    public function getGreenhouseInfo($id){
        $greenhouse = Greenhouse::find((int)$id)->first();
        $response  = [
            'success' => true,
            'data' => $greenhouse,
            'message' => null,
            'error' => null,
        ];
        return response()->successResponse($greenhouse);
    }
}
