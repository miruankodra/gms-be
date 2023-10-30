<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Greenhouse;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function getStatistics($id){
        $statistics = Greenhouse::find($id)->statistic;

        $tempData = [];
        $soilData = [];
        $airData = [];
        $day = [];
        foreach($statistics as $i=>$stat){
            array_push($tempData, $stat->temp_avg);
            array_push($airData, $stat->air_humid_avg);
            array_push($soilData, $stat->soil_humid_avg);
            array_push($day, $stat->created_at);
//            array_push($day, $stat->day);
        }
        sleep(5);
        return response()->successResponse([$tempData, $airData, $soilData, $day]);
    }

}
