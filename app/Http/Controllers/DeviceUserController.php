<?php

namespace App\Http\Controllers;

use App\User;
use App\Device;
use Illuminate\Http\Request;

class DeviceUserController extends Controller
{
    public function __construct(){
        $this->middleware('role:admin');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request,$id)
    {
        $user = User::find($id);

        if($request->has('cari')){
            $device_user = Device::where('device_name','LIKE','%'.$request->cari.'%')->where('user_id','='.$id)->orderby('device_numbercode','desc');
            // dd($device_user);
        }else{
            $device_user =  $user->devices;
        }
        // dd($user);
        // $user = $user->paginate(5);
        // $user->appends($request->only('cari'));

        return view('user.device_user',compact('user','device_user'));
    }


}
