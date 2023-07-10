@extends('Backend.layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pesanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pesanan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Pesanan
            </div>
            <div class="card-body">
                <a href="{{('/admin/pesanan/create')}}" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat Pemesan</th>
                            <th>No HP</th>
                            <th>Jumlah Pesanan</th>
                            <th>Produk ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan as $ps)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ps->tanggal }}</td>
                                <td>{{ $ps->nama_pemesan }}</td>
                                <td>{{ $ps->alamat_pemesan }}</td>
                                <td>{{ $ps->no_hp }}</td>
                                <td>{{ $ps->jumlah_pesanan}}</td>
                                <td>{{ $ps->produk_id}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ url('/admin/pesanan/show', $ps->id) }}"><i class="fas fa-eye"></i></a>
                                    <!-- <a class="btn btn-warning btn-sm" href="{{ url('/admin/pesanan/edit', $ps->id) }}"><i class="fas fa-pen"></i></a> -->
                                    <form action="{{ url('/admin/pesanan/destroy', $ps->id) }}"
                                        class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="if(!confirm('Are you sure you want to delete the {{ $ps->nama_pemesan }} data?')) {return false};"
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
