<?php

namespace App\Http\Controllers;

use App\Model\carModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Input;
use Log;

class carlistController extends Controller
{
    public function index(Request $request)
    {
        Log::debug("hoge");

        $carModel = new carModel();
        $car = $carModel->where('user_id', Auth::id())->orderBy('id', 'asc')->get();
        if(count($car) == 0) {
            return redirect('/add/car/');
        }

        return view('list')->with(['cars' => $car, 'returnCarId' => $request->carId]);
    }
}
