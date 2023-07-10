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
            Data Kategori
        </div>
        <div class="card-body">
            <a href="{{('/admin/kategori/create')}}" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ url('/admin/kategori/show', $k->id) }}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-warning btn-sm" href="{{ url('/admin/kategori/edit', $k->id) }}"><i class="fas fa-pen"></i></a>
                            <form action="{{ url('/admin/kategori/destroy', $k->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="if(!confirm('Are you sure you want to delete the {{ $k->nama }} data?')) {return false};" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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