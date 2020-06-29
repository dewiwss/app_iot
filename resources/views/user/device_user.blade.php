@extends('layouts.master')

@section('title','Data Device User')

@section('content_header')
<li class="breadcrumb-item"><a href="/user">User</a></li>
<li class="breadcrumb-item active">Data Device User</li>
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

            <div class="card-tools">
                <form action="/user/{{$user->id}}/device_user" method="get">
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
        <h3>Nama Pengguna : {{$user->name}}</h3>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th>Kode Device</th>
            <th>Nama Device</th>
            <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($device_user as $device)
            <tr>
                <td>{{$device->device_numbercode}}</td>
                <td>{{$device->device_name}}</td>
                <td>{{$device->description}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
    </div>
    </div>
@endsection


