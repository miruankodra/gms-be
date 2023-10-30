<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use App\Models\Climate;
use App\Models\Modality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BotsController extends Controller
{
    public function getBotInfo($id){
        $bot = Bot::find($id);
        return response()->successResponse($bot, 'Found bot successfully!');
    }

    public function dataStore(Request $request) {
//        Log::alert(var_dump($request->all()));
        $climate = new Climate();
        $climate->fill($request->all());

        if ($climate->save()) {
            return response()->successResponse([], 'Data stored!');
        } else {
            return response()->errorResponse([], 'Data stored!');
        }
    }

    public function getBotModality($botId){
        $bot = Bot::find($botId);
        $modality = $bot->modality()->first();
        $data = [
            'max_temp' => $modality->max_temperature,
            'min_temp' => $modality->min_temperature,
            'max_ah' => $modality->max_air_humidity,
            'min_ah' => $modality->min_air_humidity,
            'max_sh' => $modality->max_soil_humidity,
            'min_sh' => $modality->min_soil_humidity,
        ];

        return response()->successResponse($data);
    }

    public function checkModality($botId){
        $bot = Bot::find($botId);
        $modality_id = $bot->modality_id;
        $modality = Modality::find($modality_id);
        return response()->json($modality);
    }
}
