@extends('Backend.layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pengguna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengguna</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Detail USER
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>{{$user->password}}</td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>:</td>
                        <td>{{$user->role}}</td>
                    </tr>
                </table>
                <a href="{{url('/admin/user')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
