<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PanelController;
use App\Models\Bot;
use App\Models\Modality;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    public function __construct()
    {
    }

    public function getModalities ($id) {
        $modalities = Modality::where('greenhouse_id', '=', $id)->get();
        return response()->successResponse($modalities, 'Modalities Loaded!');
    }

    public function getModalityInfo ($id) {
        $bot = Bot::where('greenhouse_id', '=', $id)->first();
        $bot_id = $bot->id;
        $modality = Modality::find($bot->modality_id);
        return response()->successResponse([$modality, $bot_id], 'Modality Loaded!');
    }

    public function changeModality (Request $request) {
        $data = $request->all();
        $modality = Modality::find($data['modality_id']);
        $bot = Bot::where('greenhouse_id', '=', $data['greenhouse_id'])->first();

//        try {
            $bot->modality_id = $modality->id;

            if ($bot->save()) {
                return response()->successResponse($modality, 'Modality loaded!');
            } else {
                return response()->errorResponse([], 'Could not load modality!');
            }
//        }
//        catch (QueryException $e){
//            return response()->errorResponse($e, 'Internal server error!');
//        }
//        catch (\Exception $e){
//            return response()->errorResponse($e, 'Internal server error!');
//        }


    }

    public function store(Request $request) {
        $modality = new Modality();

        try {
            $modality->fill($request->all());

            if ($modality->save()){
                return response()->successResponse($modality, 'Modality stored successfully!');
            } else {
                return response()->errorResponse([], 'Could not save modality!');
            }
        }
        catch (QueryException $e){
            return response()->errorResponse($e);
        }
        catch (\Exception $e){
            return response()->errorResponse($e);
        }


    }
}
