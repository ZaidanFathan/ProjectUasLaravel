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
            Edit Kategori {{ $kategori->nama }}
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('admin/kategori/update', $kategori->id) }}">
                @csrf
                @method('put')
                <div class="form-group row mb-3">
                    <label for="nama" class="col-4 col-form-label">Nama</label>
                    <div class="col-8">
                        <input id="nama" name="nama" value="{{ $kategori->nama }}" type="text" class="form-control">
                        @if (count($errors) > 0)
                        <i class="text-danger"><small>{{ $errors->first('nama') }}</small></i>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{url('/admin/kategori/')}}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection