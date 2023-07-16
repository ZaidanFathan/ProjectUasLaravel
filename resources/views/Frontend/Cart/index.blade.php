@extends('frontend.layout.app')
@section('content')
<div class="container mb-sm-5">
    <h4 class="mt-5">Items in my cart</h4>
    <hr />
    <div class="row">
      <div class="col-lg-6">
        <table class="table mt-5">
          <thead>
            <th>Item</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jenis Produk</th>
            <th>Total Pesanan</th>
            <th>Action</th>
          </thead>
          <tbody>
            @php
                $total = 0;
            @endphp
            @if (count($cart) == 0 )
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Oppps!</strong> Seems the cart is still empty
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
             
            <form action="{{url('/produk/cart/update')}}" method="POST">
              @csrf

              @foreach ($cart as $value)
              @php $total += ($value->harga_jual + 25000) * $value->Total_Pesanan @endphp  
                  <tr>
              <td>
                <img
                  src="{{$value->img }} "
                  class="img-fluid h-50 w-50"
                />
              </td>
              <td>{{ $value->nama }}</td>
              <td>{{ number_format( $value->harga_jual,2,',','.') }}</td>
              <td>{{ $value->Kategori }}</td>
              <td><input type="number" value="{{$value->Total_Pesanan}}" size="5" name="total_pesanan[]" class="form-control"></td>
              <input type="hidden" name="idProduk[]" value="{{$value->id}}">
              <td class="text-center">
                <a href="{{url('/produk/cart/delete/' . $value->id)}}" class="text-decoration-none "
                  ><i class="fas fa-times fa-xs"></i
                  ></a>
              </td>
            </tr>
            @endforeach
        
          </tbody>
        </table>
        <button type="submit" class="btn btn-success">Update cart</button>
      </form>
      </div>
      <div class="col-lg-6">
        <div class="card w-100 h-100" style="width: 18rem">
          <div class="card-body" style="background-color: #f8f8f8">
            <h4 class="card-title mb-4 fw-light">Summary</h4>
            <div class="d-flex justify-content-between">
              <h6>Subtotal :</h6>
              <h6 class="fw-light">{{ number_format($total,2,',','.') }}</h6>
            </div>
            <div class="d-flex justify-content-between">
              <h6>Shipping Fee :</h6>
              <h6 class="fw-light">25.000</h6>
            </div>
            <h6>List Produk :</h6>
            <ul class="list-group">
                @foreach ($cart as $value)
                  <li class="list-group-item">{{ $value->nama }}</li>
                  @endforeach
            </ul>
            <div class="d-grid gap-2 mt-2">
              <a class="btn btn-outline-primary" href="{{url('pesanan/form')}}">
                Proceed to order
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection