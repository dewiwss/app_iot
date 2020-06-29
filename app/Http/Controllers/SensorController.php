<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SensorController extends Controller
{
    public function __construct(){
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('cari')){
            $sensors = Sensor::where('sensor_name','LIKE','%'.$request->cari.'%')->orderby('id','desc');
        }else{
            $sensors = Sensor::orderby('id','asc');
        }
        $sensors = $sensors->paginate(5);
        $sensors->appends($request->only('cari'));
        return view('sensor.index',compact('sensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sensor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate
         $validator = Validator::make($request->all(), [
            'sensor_code' => 'required|unique:sensors|numeric',
            'sensor_name' => 'required',
            'type' => 'required',
            'description' => 'required',
         ],[
            'sensor_code.required' => 'Kode sensor tidak boleh kosong',
            'sensor_code.unique' => 'Kode sensor harus unik',
            'sensor_code.numeric' => 'Kode sensor hanya diisi dengan tipe number',
            'sensor_name.required' => 'Nama sensor tidak boleh kosong',
            'type.required' => 'Type sensor tidak boleh kosong',
            'description.required' => 'Deskripsi sensor tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return redirect('sensor/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Sensor::create($request->all());
        return redirect('/sensor')->with('Success','Data Berhasil Disimpan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sensor = Sensor::find($id);
        return view('sensor.detail',compact('sensor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sensor = Sensor::find($id);
        return view('sensor.edit',compact('sensor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //validate
         $validator = Validator::make($request->all(), [
            'sensor_name' => 'required',
            'type' => 'required',
            'description' => 'required',
         ],[
            'sensor_name.required' => 'Nama sensor tidak boleh kosong',
            'type.required' => 'Type sensor tidak boleh kosong',
            'description.required' => 'Deskripsi sensor tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return redirect('sensor')
                        ->withErrors($validator)
                        ->withInput();
        }

        $sensor = Sensor::find($id);
        $sensor->update($request->all());
        return redirect('/sensor')->with('Success','Data berhasil diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sensor = Sensor::find($id);
        $sensor->delete();
        return redirect('/sensor')->with('Success','Data berhasil dihapus!!');
    }
}
