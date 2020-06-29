@extends('layouts.master')

@section('title','Detail Device')

@section('content_header')
<li class="breadcrumb-item"><a href="/user">Device</a></li>
<li class="breadcrumb-item active">Detail Device</li>
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
    <div class="card-header"><h3>Nama Device : {{$device->device_name}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
            <div class="info-box bg-success">
              {{-- <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span> --}}

              <div class="info-box-content">
                <span class="info-box-number">Kode : {{$device->device_numbercode}}</span>
                <span class="info-box-text">{{$device->description}}</span>
                <span class="info-box-text"><b> Pengguna : </b>{{$device->users->name}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

        <h5 class="mt-4 mb-2">Sensor Device</h5>
        <div class="row">
        @foreach ($device->sensors as $sensor)
            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">

            <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

            <div class="info-box-content">
                <div class="inner">

                <span class="info-box-text">Tipe : {{$sensor->type}}</span>
                <span class="info-box-number">{{$sensor->sensor_name}}</span>

                <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description badge bg-warning ">
                    Data Sensor : {{$sensor->pivot->data_sensor}}
                </span>

                </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <div>
                <a href="/sensor/{{$sensor->id}}/detail" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- /.col -->
        @endforeach
        </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
    </div>
    </div>
@endsection


