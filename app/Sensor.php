<?php

namespace App;

use App\Device;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table = 'sensors';
    protected $fillable = ['sensor_code','sensor_name','type','description'];

    public function devices(){
        return $this->belongsToMany(Device::class,'device_sensors','device_id','sensor_id')->withTimestamps()->withPivot('data_sensor');
    }
}
