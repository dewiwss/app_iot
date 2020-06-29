@extends('layouts.master')

@section('title','Tambah Data Sensor')

@section('content_header')
<li class="breadcrumb-item"><a href="/sensor">Data Sensor</a></li>
<li class="breadcrumb-item active">Tambah Data Sensor</li>
@endsection

@section('content')
<div class="card card-primary">
<!-- /.card-header -->
<!-- form start -->
<form role="form" action="/sensor/store" method="post">
    {{csrf_field()}}
    <div class="card-body">
        <div class="form-group">
            <label for="sensor_code">Kode Sensor</label>
            <input type="text" name="sensor_code" id="sensor_code" placeholder="Masukkan Kode Sensor.." class="form-control @error('sensor_code') is-invalid @enderror">
            @error('sensor_code')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="sensor_name">Nama Sensor</label>
            <input type="text" name="sensor_name" id="sensor_name" placeholder="Masukkan Nama Sensor.." class="form-control @error('sensor_name') is-invalid @enderror">
            @error('sensor_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" placeholder="Deskripsi.." class="form-control @error('type') is-invalid @enderror">
            @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Deskripsi.." class="form-control @error('description') is-invalid @enderror"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
    </div>
</form>
</div>
@endsection


