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
      Detail Pesanan
    </div>
    <div class="card-body">
      <table class="table">
        <tr>
          <td>ID</td>
          <td>:</td>
          <td>{{$pesanan->id}}</td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td>:</td>
          <td>{{$pesanan->tanggal}}</td>
        </tr>
        <tr>
          <td>Nama Pemesan</td>
          <td>:</td>
          <td>{{$pesanan->nama_pemesan}}</td>
        </tr>
        <tr>
          <td>Alamat Pemesan</td>
          <td>:</td>
          <td>{{$pesanan->alamat_pemesan}}</td>
        </tr>
        <tr>
          <td>No HP</td>
          <td>:</td>
          <td>{{$pesanan->no_hp}}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td>{{$pesanan->email}}</td>
        </tr>
        <tr>
          <td>Jumlah Pesanan</td>
          <td>:</td>
          <td>{{$pesanan->jumlah_pesanan}}</td>
        </tr>
        <tr>
          <td>Deskripsi</td>
          <td>:</td>
          <td>{{$pesanan->deskripsi}}</td>
        </tr>
        <tr>
          <td>Total</td>
          <td>:</td>
          <td>{{$pesanan->total}}</td>
        </tr>
        <tr>
          <td>Produk ID</td>
          <td>:</td>
          <td>{{$pesanan->produk_id}}</td>
        </tr>
        <tr>
          <td>Users ID</td>
          <td>:</td>
          <td>{{$pesanan->users_id}}</td>
        </tr>
      </table>
      <a href="{{url('/admin/pesanan')}}" class="btn btn-secondary">Back</a>
    </div>
  </div>
</div>
@endsection