@extends('layouts.master')

@section('title','Data Device')

@section('content_header')
<li class="breadcrumb-item active">Data Device</li>
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
            <a href="{{url('/device/create')}}" class="btn btn-primary btn-block bg-gradient-primary btn-sm nav-icon fas fa-edit"> Tambah Data Device</a>
        </div>

            <div class="card-tools">
                <form action="/device" method="get">
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
    <div class="card-body  table-responsive">
        <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th>ID</th>
            <th>Kode Device</th>
            <th>Nama Device</th>
            <th>Deskripsi</th>
            <th>Pengguna</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($devices as $device)
            <tr>
                <td>{{$device->id}}</td>
                <td>{{$device->device_numbercode}}</td>
                <td><a href="/device/{{$device->id}}/detail">{{$device->device_name}}</a></td>
                <td>{{$device->description}}</td>
                <td><a href="/user/{{$device->user_id}}/detail">{{$device->users->name}}</a></td>
                <td>
                    <a href="/device/{{$device->id}}/edit" class="badge bg-warning "><i class="fas fa-edit"></i>Update</a>
                    <a class="badge bg-danger" href="/device/{{$device->id}}/delete" onclick="return confirm('Yakin menghapus Data Device {{$device->device_numbercode}} {{$device->device_name}}?')"><i class="far fa-trash-alt"></i> Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
            {{$devices->links()}}
            <div class="badge bg-warning">Jumlah Data Device : {{$devices->total()}}</div>
    </div>
    </div>
@endsection


