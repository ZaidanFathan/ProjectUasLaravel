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
                Data Produk
            </div>
            <div class="card-body">
                <a href="{{('/admin/produk/create')}}" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->kode }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>Rp.{{ number_format($p->harga_jual) }}</td>
                                <td>{{ $p->stok }}</td>
                                <td>{{ $p->KategoriProduk->nama }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ url('/admin/produk/show', $p->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm" href="{{ url('/admin/produk/edit', $p->id) }}"><i class="fas fa-pen"></i></a>
                                    <form action="{{ url('/admin/produk/destroy', $p->id) }}"
                                        class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="if(!confirm('Are you sure you want to delete the {{ $p->nama }} data?')) {return false};"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
