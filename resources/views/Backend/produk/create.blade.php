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
                <form method="post" action="{{ url('admin/produk/store') }}">
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="kode" class="col-4 col-form-label">Kode</label>
                        <div class="col-8">
                            <input id="kode" name="kode" value="{{ old('kode') }}" type="text"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('kode') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="nama" class="col-4 col-form-label">Nama</label>
                        <div class="col-8">
                            <input id="nama" name="nama" value="{{ old('nama') }}" type="text"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('nama') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="harga_jual" class="col-4 col-form-label">Harga jual</label>
                        <div class="col-8">
                            <input id="harga_jual" name="harga_jual" value="{{ old('harga_jual') }}" type="number"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('harga_jual') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="harga_beli" class="col-4 col-form-label">Harga beli</label>
                        <div class="col-8">
                            <input id="harga_beli" name="harga_beli" value="{{ old('harga_beli') }}" type="number"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('harga_beli') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="stok" class="col-4 col-form-label">Stok</label>
                        <div class="col-8">
                            <input id="stok" name="stok" value="{{ old('stok') }}" type="number"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('stok') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="min_stok" class="col-4 col-form-label">Min stok</label>
                        <div class="col-8">
                            <input id="min_stok" name="min_stok" value="{{ old('min_stok') }}" type="number"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('min_stok') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="img" class="col-4 col-form-label">Img</label>
                        <div class="col-8">
                            <input id="img" name="img" value="{{ old('img') }}" type="text"
                                class="form-control" >
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('img') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="kategori_produk_id" class="col-4 col-form-label">Kategori_produk_id</label>
                        <div class="col-8">
                            <select id="kategori_produk_id" name="kategori_produk_id" class="form-control" >
                                @foreach ($kategori_produk as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                @endforeach
                                @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('kategori_produk_id') }}</small></i>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                        <div class="col-8">
                            <textarea id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" type="text" class="form-control" >{{ old('deskripsi') }}</textarea>
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('deskripsi') }}</small></i>
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
