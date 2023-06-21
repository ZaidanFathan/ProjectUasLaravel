@extends('frontend.layout.app')
@section('content')

@php
    $total = 0;
@endphp



<div class="container">
  <h2 class="mt-4">Process Your Order</h2>
  <div class="row">
    <div class="col-lg-6 mt-4">
      <h4 class="fw-light">Order Detail</h4>
      <hr />
     

      <form method="POST" action="{{url('pesanan/proses')}}">
        @csrf 
        {{ csrf_field() }}
        <div class="mb-3">
          <label class="form-label">Nama Pemesan</label>
          <input
            type="text"
            class="form-control rounded-pill border border-success"
            name="nama_pemesan"
            value="{{ Auth::user()->name }}"
            required
          />
        </div>
        <div class="mb-3">
          <label class="form-label">Alamat </label>
          <textarea
            name="alamat_pemesan"
            class="form-control border border-success rounded"
            cols="30"
            rows="5"
            required
          ></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">No Handphone </label>
          <input type="number" name="no_hp" class="form-control rounded-pill border border-success" required />
        </div>
        <div class="mb-3">
          <label class="form-label">Email </label>
          <input type="email" name="email" class="form-control rounded-pill border border-success" required/>
        </div>

        <div class="mb-3">
          <label class="form-label">Keterangan </label>
          <textarea
            name="deskripsi"
            class="form-control rounded border border-success"
            cols="30"
            rows="10"
            required
          ></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Tanggal Pemesanan </label>
          <input
            type="date"
            name="tanggal"
            class="form-control rounded border border-success"
            required
          />
        </div>
        <div class="d-grid gap-2 my-3">
          <input type="submit" name="proses" type="submit" class="btn btn-success rounded-pill" value="Process To Checkout"/>
        </div>
      </form>
    </div>
    <div class="col-lg-6">
      <h5 class="fw-light mt-4">YOUR ORDER</h5>
      <hr />
     @if (count($data) == 0)
        <h2 class="fw-light text-center">Nothing Here </h2>
     @else
         @foreach ($data as $value)
         @php
             $total += $value->harga_jual
         @endphp
               <div class="d-flex justify-content-evenly mt-2 ">
                <img
                  src="{{ $value->img }}"
                  class="img-fluid rounded me-4 object-fit-fill"
                  style="height: 200px; width: 120px"
                />
                <div class="mx-2">
                  <h5 class="fw-lighter">{{ $value->nama }}</h5>
                  <p>
                  {{ substr( $value->deskripsi,0,166) }}
                  </p>
                  <h6>{{ number_format( $value->harga_jual,2,',','.') }}</h6>
                </div>
              </div>
         @endforeach
     @endif
    </div>
  </div>
</div>


@endsection