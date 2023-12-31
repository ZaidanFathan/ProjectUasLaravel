
@extends('frontend.layout.app')
@section('content')
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Alexander Shop</h1>
            <p class="lead fw-normal text-white-50 mb-0">Kelompok 1</p>
        </div>
    </div>
</header>
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @foreach ($produk as $item)
            
      
        <div class="col mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img class="card-img-top" src="{{$item->img}}" alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">{{$item->nama}}</h5>
                        <!-- Product price-->
                        {{number_format($item->harga_jual,2,',','.')}}
                    </div>
                </div>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('/produk/cart/insert/'. $item->id)}}">Add To Cart</a></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection