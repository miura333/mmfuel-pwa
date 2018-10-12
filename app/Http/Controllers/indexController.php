<?php

namespace App\Http\Controllers;

use App\Model\fuelRecordModel;

use Illuminate\Http\Request;


class indexController extends Controller
{
    //
    public function index()
    {
        $fuelRecordModel = new fuelRecordModel();
        $records = $fuelRecordModel->where('user_id', 1)->where('car_id', 1)->orderBy('date', 'desc')->get();

        $latestRate = $records[0]->fuel_rate;

        return view('index')->with('latestRate',$latestRate);
    }
}
