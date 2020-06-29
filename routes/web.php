<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::group(['middleware'=>'auth','role' => 'admin'],function(){
    //menampilkan home dashboard
    Route::get('/home', 'HomeController@index')->name('home');

    //DATA USER
    //menampilkan data user
    Route::get('/user','UserController@index');
    //menampilkan data user
    Route::get('/user/{id}/detail','UserController@show');
    ////route untuk mengarahkan ke tampilan form tambah data
    Route::get('/user/create','UserController@create');
    //route mengirim data di form atau proses penambahan data melalui form
    Route::post('/user/store','UserController@store');
    //route delete data user
    Route::get('/user/{id}/delete','UserController@destroy');
    //route untuk mrngarahkan ke tampilan form edit data
    Route::get('/user/{id}/edit','UserController@edit');
    //route proses update data user
    Route::post('/user/{id}/update','UserController@update');

    //DATA DEVICE USER
    //melihat device milik user tertentu
    Route::get('/user/{id}/device_user','DeviceUserController@index');

    //DATA DEVICE
    //menampilkan data device
    Route::get('/device','DeviceController@index');
    //route untuk mengarahkan ke tampilan form tambah data
    Route::get('/device/create','DeviceController@create');
    //route mengirim data di form atau proses penambahan data melalui form
    Route::post('/device/store','DeviceController@store');
    //route delete data device
    Route::get('/device/{id}/delete','DeviceController@destroy');
    //route untuk mrngarahkan ke tampilan form edit data
    Route::get('/device/{id}/edit','DeviceController@edit');
    //route proses update data device
    Route::post('/device/{id}/update','DeviceController@update');

    //melihat SENSOR milik device tertentu .. detail device
    Route::get('/device/{id}/detail','DeviceController@show');

    //DATA SENSOR
    //menampilkan data sensor
    Route::get('/sensor','SensorController@index');
    ////route untuk mengarahkan ke tampilan form tambah data
    Route::get('/sensor/create','SensorController@create');
    //route mengirim data di form atau proses penambahan data melalui form
    Route::post('/sensor/store','SensorController@store');
    //route delete data sensor
    Route::get('/sensor/{id}/delete','SensorController@destroy');
    //route untuk mrngarahkan ke tampilan form edit data
    Route::get('/sensor/{id}/edit','SensorController@edit');
    //route proses update data sensor
    Route::post('/sensor/{id}/update','SensorController@update');

    //melihat SENSOR milik device tertentu .. detail device
    Route::get('/sensor/{id}/detail','SensorController@show');

});

Route::group(['prefix'=>'user','middleware'=>'auth','role' => 'user'],function(){

    //menampilkan home dashboard
    Route::get('/home', 'HomeController@index')->name('home');

    //DATA DEVICE
    //menampilkan data device
    Route::get('/device','DeviceController@index');
    //route untuk mengarahkan ke tampilan form tambah data
    Route::get('/device/create','DeviceController@create');
    //route mengirim data di form atau proses penambahan data melalui form
    Route::post('/device/store','DeviceController@store');
    //route delete data device
    Route::get('/device/{id}/delete','DeviceController@destroy');
    //route untuk mrngarahkan ke tampilan form edit data
    Route::get('/device/{id}/edit','DeviceController@edit');
    //route proses update data device
    Route::post('/device/{id}/update','DeviceController@update');

    //melihat SENSOR milik device tertentu .. detail device
    Route::get('/device/{id}/detail','DeviceController@show');

});
