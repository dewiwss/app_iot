<?php

namespace App;

use App\User;
use App\Sensor;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table='devices';
    protected $fillable = ['device_numbercode','device_name','description','user_id'];

    //relasi device dengan user
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    //relasi device dengan sensor
    public function sensors(){
        return $this->belongsToMany(Sensor::class,'device_sensors','device_id','sensor_id')->withTimestamps()->withPivot('data_sensor');
    }
}
