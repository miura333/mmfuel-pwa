<?php

namespace App\Http\Controllers;

use App\Model\fuelRecordModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Input;
use Log;

class historyController extends Controller
{
    public function index(Request $request)
    {
        $fuelRecordModel = new fuelRecordModel();
        $records = $fuelRecordModel->where('car_id', $request->carId)->orderBy('date', 'desc')->get();
        if(count($records) > 0) {
            if($records[0]->user_id != Auth::id()) {
                //error
                Log::debug('user_id does not match with car_id'.$request->carId);
                return view('history')->with(['records' => $records, 'carId' => $request->carId]);
            }
        }

        return view('history')->with(['records' => $records, 'carId' => $request->carId]);
    }
}
