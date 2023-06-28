@extends('Backend.layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Produk</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Detail USER
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Use</td>
                        <td>:</td>
                        <td>{{$produk->nama}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{$produk->email}}</td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>{{$produk->password}}</td>
                    </tr>
                </table>
                <a href="{{url('/admin/produk')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
