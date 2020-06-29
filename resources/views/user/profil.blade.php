@extends('layouts.master')

@section('title','Profil User')

@section('content_header')
<li class="breadcrumb-item active">Profil User</li>
@endsection

@section('content')


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{asset('admin/dist/img/user4-128x128.jpg')}}"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{$user->name}}</h3>

            <p class="text-muted text-center">Bergabung pada {{$user->created_at}}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Email</b> <a class="float-right">{{$user->email}}</a>
              </li>
              <li class="list-group-item">
                <b>Role</b> <a class="float-right">{{$user->role}}</a>
              </li>
            </ul>

            <a href="/user/{{$user->id}}/edit" class="btn btn-primary btn-block"><b>Ubah Data</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
