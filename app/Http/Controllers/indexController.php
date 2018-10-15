<?php

namespace App\Http\Controllers;

use App\Model\fuelRecordModel;
use App\Model\carModel;

use Illuminate\Http\Request;


class indexController extends Controller
{
    //
    public function index()
    {
        $fuelRecordModel = new fuelRecordModel();
        $records = $fuelRecordModel->where('user_id', 1)->where('car_id', 1)->orderBy('date', 'desc')->get();

        $latestRate = 0.0;
        $averageRate = 0.0;
        if(count($records) > 0) {
            $latestRate = $records[0]->fuel_rate;
            $averageRate = $this->getAverageRate($records);
        }

        $carModel = new carModel();
        $car = $carModel->where('id', 1)->get();

        $carName = $car[0]->car_name;

        return view('index')->with(['latestRate' => $latestRate, 'averageRate' => $averageRate, 'carName' => $carName]);
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
