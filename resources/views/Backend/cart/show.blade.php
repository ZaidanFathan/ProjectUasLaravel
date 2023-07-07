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
      Detail Cart
    </div>
    <div class="card-body">
      <table class="table">
        <tr>
          <td>ID</td>
          <td>:</td>
          <td>{{$cart->id}}</td>
        </tr>
        <tr>
          <td>Total</td>
          <td>:</td>
          <td>{{$cart->total}}</td>
        </tr>
        <tr>
          <td>Produk ID</td>
          <td>:</td>
          <td>{{$cart->produk_id}}</td>
        </tr>
        <tr>
          <td>Users ID</td>
          <td>:</td>
          <td>{{$cart->users_id}}</td>
        </tr>
      </table>
      <a href="{{url('/admin/cart')}}" class="btn btn-secondary">Back</a>
    </div>
  </div>
</div>
@endsection