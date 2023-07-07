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
                Tambah Pesanan
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('admin/pesanan/store') }}">
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="tanggal" class="col-4 col-form-label">Tanggal</label>
                        <div class="col-8">
                            <input id="tanggal" name="tanggal" type="date" value="{{ old('tanggal') }}" type="text"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('tanggal') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="nama_pemesan" class="col-4 col-form-label">Nama Pemesan</label>
                        <div class="col-8">
                            <input id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan') }}" type="text"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('nama_pemesan') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="alamat_pemesan" class="col-4 col-form-label">Alamat Pemesan</label>
                        <div class="col-8">
                            <input id="alamat_pemesan" name="alamat_pemesan" value="{{ old('alamat_pemesan') }}" type="text"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('alamat_pemesan') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="no_hp" class="col-4 col-form-label">No HP</label>
                        <div class="col-8">
                            <input id="no_hp" name="no_hp" value="{{ old('no_hp') }}" type="text"
                                class="form-control"> 
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('no_hp') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="email" class="col-4 col-form-label">Email</label>
                        <div class="col-8">
                            <input id="email" name="email" value="{{ old('email') }}" type="email"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('email') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="jumlah_pesanan" class="col-4 col-form-label">Jumlah Pesanan</label>
                        <div class="col-8">
                            <input id="jumlah_pesanan" name="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" type="number"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('jumlah_pesanan') }}</small></i>
                            @endif
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
