<?php

namespace App\Http\Controllers;

use App\Model\fuelRecordModel;

use Illuminate\Http\Request;

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
        return view('add')->with('carId', $request->carId);
    }
}
