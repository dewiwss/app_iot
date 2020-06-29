@extends('layouts.master')

@section('title','Edit Data Sensor')

@section('content_header')
<li class="breadcrumb-item"><a href="/sensor">Data Sensor</a></li>
<li class="breadcrumb-item active">Edit Data Sensor</li>
@endsection

@section('content')
<div class="card card-primary">
<!-- /.card-header -->
<!-- form start -->
<form role="form" action="/sensor/{{$sensor->id}}/update" method="post">
    {{csrf_field()}}
    <div class="card-body">
        <div class="form-group">
            <label for="sensor_code">Kode Sensor</label>
            <input type="text" name="sensor_code" value="{{$sensor->sensor_code}}" id="sensor_code" placeholder="" class="form-control @error('sensor_code') is-invalid @enderror" disabled>
            @error('sensor_code')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="sensor_name">Nama Sensor</label>
            <input type="text" name="sensor_name" value="{{$sensor->sensor_name}}" id="sensor_name" placeholder="" class="form-control @error('sensor_name') is-invalid @enderror">
            @error('sensor_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" value="{{$sensor->type}}" id="type" placeholder="" class="form-control @error('type') is-invalid @enderror">
            @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" value="{{$sensor->description}}" id="description" placeholder="" class="form-control @error('description') is-invalid @enderror">{{$sensor->description}}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>
@endsection


