<?php

namespace App\Http\Controllers;

use App\User;
use App\Device;
use App\Sensor;
use App\DeviceSensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Auth::check();

        if(Auth::user()->hasRole('admin')){
            if($request->has('cari')){
                $devices = Device::where('device_name','LIKE','%'.$request->cari.'%')->orderby('device_numbercode','desc');
            }else{
                $devices = Device::orderby('id','asc');
            }
            // dd($devices);
            $devices = $devices->paginate(5);
            $devices->appends($request->only('cari'));
            return view('device.index',compact('devices'));
        }

            if($request->has('cari')){
                $devices = Device::where('device_name','LIKE','%'.$request->cari.'%')->where('user_id',Auth::user()->id)->orderby('device_numbercode','desc');
            }else{
                $devices = Device::where('user_id',Auth::user()->id);
            }
            // dd($devices);
            $devices = $devices->paginate(5);
            $devices->appends($request->only('cari'));
            return view('device.index',compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $sensors = Sensor::all();
        return view('device.create',compact('users','sensors'));
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
            'device_numbercode' => 'required|unique:devices|numeric',
            'device_name' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'sensor_id' => 'required',
        ],[
            'device_numbercode.required' => 'Kode device tidak boleh kosong',
            'device_numbercode.unique' => 'Kode device harus unik',
            'device_numbercode.numeric' => 'Kode device hanya diisi dengan tipe number',
            'device_name.required' => 'Nama device tidak boleh kosong',
            'description.required' => 'Deskripsi device tidak boleh kosong',
            'user_id.required' => 'Pengguna tidak boleh kosong',
            'sensor_id.required' => 'Sensor tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return redirect('device/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        //instansiasi Device
        $device = new Device($request->all());

        // store data
        if($device->save()){
            foreach($request->sensor_id as $sensor => $id){
                $data = ['sensor_id' => $id];
                //menambahkan sensor_id ke tabel pivot device_sensors
                $device->sensors()->attach($data);
                //menambahkan device_id ke tabel pivot device_sensors
                $device->sensors()->attach($request->id);
            }
            return redirect('/device')->with('Success','Data Berhasil Disimpan!!');
        }else{
            return redirect('/device')->with('error','Data Gagal Disimpan!!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Device::find($id);
        return view('device.detail',compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::find($id);
        $users = User::all();
        $sensors = Sensor::all();
        return view('device.edit',compact('device','users','sensors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //validate
        $validator = Validator::make($request->all(), [
            'device_name' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'sensor_id' => 'required',
        ],[
            'device_name.required' => 'Nama device tidak boleh kosong',
            'description.required' => 'Deskripsi device tidak boleh kosong',
            'user_id.required' => 'Pengguna tidak boleh kosong',
            'sensor_id.required' => 'Sensor tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return redirect("/device/$request->id/edit")
                        ->withErrors($validator)
                        ->withInput();
        }

         //ambil id device
        $device = Device::findOrFail($id);

        // update data
        if($device->update($request->all())){
            foreach($request->sensor_id as $sensor => $id){
                $data = ['sensor_id' => $id];
                //sinkronisasi (detach lalu attach) sensor_id di tabel pivot device_sensors
                $device->sensors()->sync($data);
            }
            return redirect('/device')->with('Success','Data Berhasil Diubah!!');
        }else{
            return redirect('/device')->with('error','Data Gagal Diubah!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->sensors()->detach();

        if(!$device->delete()){
            return redirect('/device')->with('error','Data gagal dihapus!!');
        }

        return redirect('/device')->with('Success','Data berhasil dihapus!!');
    }
}
