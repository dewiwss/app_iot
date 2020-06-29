@extends('layouts.master')

@section('title','Detail Sensor')

@section('content_header')
<li class="breadcrumb-item"><a href="/user">Sensor</a></li>
<li class="breadcrumb-item active">Detail Sensor</li>
@endsection

@section('content')

@if(session('Success'))
    <div class="card bg-success">
        <div class="card-header">
        <h3 class="card-title">Success</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
        </div>
        <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        {{session('Success')}}
        </div>
        <!-- /.card-body -->
    </div>
@endif
<div class="card">
    <div class="card-header"><h3>Nama Sensor : {{$sensor->sensor_name}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
            <div class="info-box bg-success">
              {{-- <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span> --}}

              <div class="info-box-content">
                <span class="info-box-number">Kode Sensor : {{$sensor->sensor_code}}</span>
                <span class="info-box-text"><b>Deskripsi : </b>{{$sensor->description}}</span>
                <span class="info-box-text"><b> Tipe : </b>{{$sensor->type}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

        <h5 class="mt-4 mb-2">Device yang menggunakan sensor <b>{{$sensor->sensor_name}}</b></h5>
        <div class="row">
        @foreach ($sensor->devices as $device)
            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">

            <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

            <div class="info-box-content">
                <div class="inner">

                <span class="info-box-text">Kode : {{$device->device_numbercode}}</span>
                <span class="info-box-number">{{$device->device_name}}</span>

                <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                   Pengguna : {{$device->users->name}}
                </span>

                </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <div>
                <a href="/device/{{$device->id}}/detail" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- /.col -->
        @endforeach
        </div>

        {{-- <table class="table table-bordered">
        <thead>
            <tr>
            <th>Sensor sensor</th>
            <th>Type</th>
            <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->sensors as $sensor)
            <tr>
                <td>{{$sensor->sensor_numbercode}}</td>
                <td>{{$sensor->sensor_name}}</td>
                <td>{{$sensor->description}}</td>
            </tr>
            @endforeach
        </tbody>
        </table> --}}
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
    </div>
    </div>
@endsection


