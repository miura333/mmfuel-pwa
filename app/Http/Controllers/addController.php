<?php

namespace App\Http\Controllers;

use App\Model\fuelRecordModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Input;
use Log;

class addController extends Controller
{
    public function index(Request $request)
    {
        return view('add')->with('carId', $request->carId);
    }

    public function add(Request $request)
    {
        Log::debug($request);

        $modelOfLastRecord = new fuelRecordModel();
        $records = $modelOfLastRecord->where('car_id', $request->carId)->orderBy('date', 'desc')->get();

        $fuel = $request->fuelNumber.".".$request->fuelDecimal;

        $fuelRate = 0.0;
        if(count($records)) {
            $distance = $request->trip - $records[0]->trip;
            $fuelRate = $distance/(double)$fuel;
        }

        $dateUnixtime = time();

        Log::debug($fuel." ".$fuelRate." ".$dateUnixtime);

        $model = new fuelRecordModel();
        $model->user_id = Auth::id();
        $model->car_id = $request->carId;
        $model->date = $dateUnixtime;
        $model->trip = $request->trip;
        $model->fuel = (double)$fuel;
        $model->price_of_fuel = $request->price;
        $model->fuel_rate = $fuelRate;
        $model->save();

        return redirect('/'.$request->carId);
    }
}
