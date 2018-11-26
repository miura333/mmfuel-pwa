<?php

namespace App\Http\Controllers;

use App\Model\fuelRecordModel;
use App\Model\carModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function getCarInfo(Request $request)
    {
        $carId = $this->getLatestCarId();
        // if($carId == 0) {
        //     return redirect('/add/car/');
        // }

        if(isset($request->carId)){
            $carId = $request->carId;
        }

        $fuelRecordModel = new fuelRecordModel();
        $records = $fuelRecordModel->where('user_id', Auth::id())->where('car_id', $carId)->orderBy('date', 'desc')->get();

        $latestRate = 0.0;
        $averageRate = 0.0;
        if(count($records) > 1) {   //2件以上ないと燃費計測できないため。
            $latestRate = $records[0]->fuel_rate;
            $averageRate = $this->getAverageRate($records);
        }

        $carModel = new carModel();
        $car = $carModel->where('id', $carId)->get();

        $carName = $car[0]->car_name;

        return ['latestRate' => sprintf('%.1f',$latestRate), 'averageRate' => sprintf('%.1f',$averageRate), 'carName' => $carName, 'carId' => $carId, 'history' => $records];

    }
    //
    public function index(Request $request)
    {
        $carId = $this->getLatestCarId();
        if($carId == 0) {
            return redirect('/add/car/');
        }

        if(isset($request->carId)){
            $carId = $request->carId;
        }

        $fuelRecordModel = new fuelRecordModel();
        $records = $fuelRecordModel->where('user_id', Auth::id())->where('car_id', $carId)->orderBy('date', 'desc')->get();

        $latestRate = 0.0;
        $averageRate = 0.0;
        if(count($records) > 1) {   //2件以上ないと燃費計測できないため。
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

    private function getLatestCarId()
    {
        $carModel = new carModel();
        $car = $carModel->where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        if(count($car) == 0) return 0;

        return $car[0]->id;
    }
}
