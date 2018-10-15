<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class carModel extends Model
{
    //
    protected $table = 'cars';

    protected $fillable = [
        'id',
        'user_id',
        'car_name'
    ];
}
