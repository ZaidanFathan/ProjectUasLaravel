@extends('Backend.layouts.app')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Kategori Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kategori Produk</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Detail Kategori Produk
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>ID</td>
                    <td>:</td>
                    <td>{{$kategori->id}}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$kategori->nama}}</td>
                </tr>
            </table>
            <a href="{{url('/admin/kategori')}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection