@extends('Backend.layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Cart</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Cart</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Cart
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Total</th>
                            <th>Produk ID</th>
                            <th>Users ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->total }}</td>
                                <td>{{ $c->produk_id }}</td>
                                <td>{{ $c->users_id }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ url('/admin/cart/show', $c->id) }}"><i class="fas fa-eye"></i></a>
                                    <form action="{{ url('/admin/cart/destroy', $c->id) }}"
                                        class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="if(!confirm('Are you sure you want to delete the data?')) {return false};"
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
