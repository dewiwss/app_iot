@extends('layouts.master')

@section('title','Data Sensor')

@section('content_header')
<li class="breadcrumb-item active">Data Sensor</li>
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
    <div class="card-header">
        <div class="card-title">
            <a href="{{url('/sensor/create')}}" class="btn btn-block bg-gradient-primary btn-sm nav-icon fas fa-edit"> Tambah Data Sensor</a>
        </div>

            <div class="card-tools">
                <form action="/sensor" method="get">
                <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" class="form-control float-right" placeholder="Search" name="cari">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
                </div>
                </form>
            </div>
            </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
        <thead>
            <tr>
            <th>ID</th>
            <th>Kode Sensor</th>
            <th>Nama Sensor</th>
            <th>Type</th>
            <th>Description</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sensors as $sensor)
            <tr>
                <td>{{$sensor->id}}</td>
                <td>{{$sensor->sensor_code}}</td>
                <td><a href="/sensor/{{$sensor->id}}/detail">{{$sensor->sensor_name}}</a></td>
                <td>{{$sensor->type}}</td>
                <td>{{$sensor->description}}</td>
                <td>
                    <a href="/sensor/{{$sensor->id}}/edit" class="badge bg-warning "><i class="fas fa-edit"></i>Update</a>
                    <a class="badge bg-danger" href="/sensor/{{$sensor->id}}/delete" onclick="return confirm('Yakin menghapus Data sensor {{$sensor->sensor_name}}?')"><i class="far fa-trash-alt"></i> Delete</a>


                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
            {{$sensors->links()}}
            <div class="badge bg-warning">Jumlah Data Sensor : {{$sensors->total()}}</div>

    </div>
    </div>
@endsection


