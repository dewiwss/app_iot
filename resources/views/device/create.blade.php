@extends('layouts.master')

@section('title','Tambah Data Device')

@section('content_header')
<li class="breadcrumb-item"><a href="/device">Data Device</a></li>
<li class="breadcrumb-item active">Tambah Data Device</li>
@endsection

@section('content')

<div class="card card-primary">
<!-- /.card-header -->
<!-- form start -->
<form role="form" action="/device/store" method="post">
    {{csrf_field()}}
    <div class="card-body">
        <div class="form-group">
            <label for="device_numbercode">Kode Device</label>
            <input type="text" name="device_numbercode" id="device_numbercode" placeholder="Masukkan Kode Device.." class="form-control @error('device_numbercode') is-invalid @enderror" >
            @error('device_numbercode')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="device_name">Nama Device</label>
            <input type="text" name="device_name" id="device_name" placeholder="Masukkan Nama Device.." class="form-control  @error('device_name') is-invalid @enderror">
            @error('device_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea  name="description" id="description" placeholder="Deskripsi.." class="form-control @error('description') is-invalid @enderror"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- sensor --}}
            <div class="form-group">
                <label>Sensor</label>
                <select class="form-control select2bs4" multiple="multiple" name="sensor_id[]" data-placeholder="Pilih Sensor" style="width: 100%;">
                    @foreach ( $sensors as $sensor )
                    <option value="{{$sensor->id}}">{{$sensor->sensor_name}}</option>
                    @endforeach
                </select>
                @error('sensor')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        <div class="form-group">
            <label for="user_id">Nama Pengguna</label>
            <select class="form-control select2bs4" id="user_id" name="user_id" style="width: 100%;">
                @foreach ( $users as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
    </div>
</form>
</div>
@endsection


