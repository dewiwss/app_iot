@extends('layouts.master')

@section('title','Edit Data User')

@section('content_header')
<li class="breadcrumb-item"><a href="/user">Data User</a></li>
<li class="breadcrumb-item active">Edit Data User</li>
@endsection

@section('content')
<div class="card card-primary">

<!-- /.card-header -->
<!-- form start -->
<form role="form" action="/user/{{$user->id}}/update" method="post">
    {{csrf_field()}}
    <div class="card-body">
        <div class="form-group">
            <label for="name">Nama Pengguna</label>
            <input type="text" name="name" id="name" value="{{$user->name}}" placeholder="Masukkan Nama Pengguna.." class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{$user->email}}"placeholder="Email@email.com" class="form-control">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control select2bs4" id="role" name="role" value="{{$user->role}}" style="width: 100%;">
                @if ($user->role == "admin") <option value="admin" selected>admin</option>
                @else <option value="admin">admin</option>
                @endif
                @if ($user->role == "user") <option value="user" selected>user</option>
                @else <option value="user">user</option>
                @endif
            </select>
        </div>
        {{-- <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="password" id="password" placeholder="New Password.." class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="password_confirmation" id="confirm_password" placeholder="Confirm Password.." class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
        </div> --}}

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>
@endsection


