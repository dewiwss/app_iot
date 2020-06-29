<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceSensor extends Model
{
    protected $table = 'device_sensors';

    protected $fillable = ['device_id','sensor_id','data_sensor'];
}
