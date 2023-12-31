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
                Tambah Produk
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('admin/user/store') }}">
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="nama" class="col-4 col-form-label">nama</label>
                        <div class="col-8">
                            <input id="name" name="name" value="{{ old('name') }}" type="text"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('name') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="email" class="col-4 col-form-label">Email</label>
                        <div class="col-8">
                            <input id="email" name="email" value="{{ old('email') }}" type="text"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('email') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="password" class="col-4 col-form-label">Password</label>
                        <div class="col-8">
                            <input id="password" name="password" value="{{ old('password') }}" type="text"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('password') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
