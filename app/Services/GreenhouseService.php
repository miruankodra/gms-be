<?php


namespace App\Services;


use App\Models\Greenhouse;

class GreenhouseService
{

    public function getGreenhouseInfo($id){
        $greenhouse = Greenhouse::where('user_id', '=', $id);
        return response()->json($greenhouse);
    }

}
