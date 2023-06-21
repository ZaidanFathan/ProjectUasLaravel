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
                Detail Produk
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>ID</td>
                        <td>:</td>
                        <td>{{$produk->id}}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$produk->nama}}</td>
                    </tr>
                    <tr>
                        <td>Harga_jual</td>
                        <td>:</td>
                        <td>{{$produk->harga_jual}}</td>
                    </tr>
                    <tr>
                        <td>Harga_beli</td>
                        <td>:</td>
                        <td>{{$produk->harga_beli}}</td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td>:</td>
                        <td>{{$produk->stok}}</td>
                    </tr>
                    <tr>
                        <td>Min_stok</td>
                        <td>:</td>
                        <td>{{$produk->min_stok}}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td>{{$produk->deskripsi}}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>{{$produk->KategoriProduk->nama}}</td>
                    </tr>
                    <tr>
                        <td>Img</td>
                        <td>:</td>
                        <td>
                            @if ($produk->img)
                                <img src="{{  $produk->img }}" width="100px" alt="{{ $produk->nama }}">
                            @else
                            tidak ada gambar
                            @endif
                        </td>
                    </tr>
                </table>
                <a href="{{url('/admin/produk')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
