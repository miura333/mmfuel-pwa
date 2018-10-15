<?php

namespace App\Http\Controllers;

use App\Model\fuelRecordModel;
use App\Model\carModel;

use Illuminate\Http\Request;


class indexController extends Controller
{
    //
    public function index(Request $request)
    {
        $carId = 1;
        if(isset($request->carId)){
            $carId = $request->carId;
        }

        $fuelRecordModel = new fuelRecordModel();
        $records = $fuelRecordModel->where('user_id', 1)->where('car_id', $carId)->orderBy('date', 'desc')->get();

        $latestRate = 0.0;
        $averageRate = 0.0;
        if(count($records) > 0) {
            $latestRate = $records[0]->fuel_rate;
            $averageRate = $this->getAverageRate($records);
        }

        $carModel = new carModel();
        $car = $carModel->where('id', $carId)->get();

        $carName = $car[0]->car_name;

        return view('index')->with(['latestRate' => $latestRate, 'averageRate' => $averageRate, 'carName' => $carName, 'carId' => $carId]);
    }

    private function getAverageRate($records)
    {
        $count = 0;
        $totalFuelRate = 0.0;
        foreach($records as $fuelRecord){
            if($fuelRecord->fuel_rate == 0) continue;

            $totalFuelRate += $fuelRecord->fuel_rate;
            $count++;
        }

        return ($totalFuelRate / $count);
    }
}
