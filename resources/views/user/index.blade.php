@extends('layouts.master')

@section('title','Data User')

@section('content_header')
<li class="breadcrumb-item active">Data User</li>
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
            <a href="/user/create" class="btn btn-block bg-gradient-primary btn-sm nav-icon fas fa-edit"> Tambah Data User</a>
        </div>

            <div class="card-tools">
                <form action="/user" method="get">
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
            <th>#</th>
            <th>Nama Pengguna</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=0 ?>
            @foreach ($users as $user)
            <?php $no++ ?>
            <tr>
                <td>{{$no}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>
                    <a href="/user/{{$user->id}}/device_user" class="badge bg-important "><i class="fas fa-eye"></i> Lihat Device</a>
                    <a href="/user/{{$user->id}}/detail" class="badge bg-success "><i class="fas fa-eye"></i> Lihat Profil</a>
                    <a href="/user/{{$user->id}}/edit" class="badge bg-warning "><i class="fas fa-edit"></i>Update Profil</a>
                    <a class="badge bg-danger" href="/user/{{$user->id}}/delete" onclick="return confirm('Yakin menghapus Data user {{$user->name}}?')"><i class="far fa-trash-alt"></i> Delete</a>


                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
            {{$users->links()}}
            <div class="badge bg-warning">Jumlah Data User : {{$users->total()}}</div>

    </div>
    </div>
@endsection


