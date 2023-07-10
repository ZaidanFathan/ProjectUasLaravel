@extends('Backend.layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pesanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengguna</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Pengguna
            </div>
            <div class="card-body">
                <a href="{{('/admin/user/create')}}" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u ->name }}</td>
                                <td>{{ $u ->email }}</td>
                                <td>{{ $u ->password }}</td>
                                <td>{{ $u ->role }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ url('/admin/user/show', $u->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm" href="{{ url('/admin/user/edit', $u->id) }}"><i class="fas fa-pen"></i></a>
                                    <form action="{{ url('/admin/user/destroy', $u->id) }}"
                                        class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="if(!confirm('Are you sure you want to delete the {{ $u->name }} data?')) {return false};"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                        </button>
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
