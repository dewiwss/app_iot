<?php

namespace App\Http\Controllers\api;

use App\DeviceSensor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DeviceSensorController extends Controller
{

    public function data_sensor(Request $request){
         //validate
         $this->validate($request, [
            'data_sensor' => 'required',
            'device_id' => 'required',
            'sensor_id' => 'required',
        ]);

        $data_sensor = $request->input('data_sensor');
        $device_id = $request->input('device_id');
        $sensor_id = $request->input('sensor_id');

        //temukan device_id dan sensor_id di tabel pivot yang sama dengan data yang diinputkan
        //update data_sensor

        $update = DeviceSensor::where('device_id','=',$device_id)->where('sensor_id','=',$sensor_id)->update(['data_sensor' => $data_sensor]);

        //jika berhasil update data
        if($update == true){
            $message = [
                'status' => 'success',
                'message' => 'data sensor updated',
            ];
            return response()->json($message,200);
        }

        //jika gagal update data
        $response = [
        'status' => 'failed',
        'message' => 'Something wrong. Error during updating data_sensor'
        ];
        return response()->json($response,404);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //cara 2
    public function index(Request $request, $id)
    {

        //validate
        $this->validate($request, [
            'data_sensor' => 'required',
        ]);

        $data_sensor = $request->input('data_sensor');

        //find id device
        $device_sensors = DeviceSensor::findOrFail($id);
        // dd($device_sensors);


        //memasukkan nilai data sensor ke variabel data_sensor di tabel pivot device_sensors
        $device_sensors->data_sensor = $data_sensor;

        //proses update data di database
        $device_sensors->update();

        // update data
        if($device_sensors->update()){
            $message = [
                'message' => 'device_sensors updated',
                'device_id' => $device_sensors->device_id,
                'sensor_id' => $device_sensors->sensor_id,
                'device_sensors' => $device_sensors,
            ];
            return response()->json($message,200);
        }

        //jika gagal terupdate
        $response = [
        'MESSAGE' => 'Error during updating data_sensor'
        ];
        return response()->json($response,404);
    }


}
