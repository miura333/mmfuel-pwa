<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class fuelRecordModel extends Model
{
    //
    protected $table = 'fuel_records';

    protected $fillable = [
        'id',
        'user_id',
        'car_id',
        'date',
        'fuel',
        'fuel_rate',
        'price_of_fuel',
        'trip'
    ];
}
