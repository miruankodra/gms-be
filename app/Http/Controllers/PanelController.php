<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function togglePump(Request $request){
        $data = $request->all();
        $bot = Bot::find($data['botId']);
        $bot->pump = $data['state'];

        if ($bot->save()) {
            return response()->successResponse($bot);
        } else {
            return response()->errorResponse('Could not turn on the water pump!');
        }

    }

    public function toggleHeating(Request $request){
        $data = $request->all();
        $bot = Bot::find($data['botId']);
        $bot->heating = $data['state'];

        if ($bot->save()) {
            return response()->successResponse($bot);
        } else {
            return response()->errorResponse('Could not turn on the water pump!');
        }

    }

    public function toggleFan(Request $request){
        $data = $request->all();
        $bot = Bot::find($data['botId']);
        $bot->fan = $data['state'];

        if ($bot->save()) {
            return response()->successResponse($bot);
        } else {
            return response()->errorResponse('Could not turn on the water pump!');
        }

    }

    public function toggleWindow(Request $request){
        $data = $request->all();
        $bot = Bot::find($data['botId']);
        $bot->window = $data['state'];

        if ($bot->save()) {
            return response()->successResponse($bot);
        } else {
            return response()->errorResponse('Could not turn on the water pump!');
        }

    }
}
