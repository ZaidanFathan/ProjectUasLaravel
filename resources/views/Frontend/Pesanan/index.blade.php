@extends('frontend.layout.app')
@section('content')

<div class="container my-4">
    <table class="table table-striped">
        <thead>
               <tr>
                <th>Nama Pemesan</th>

                <th>Produk</th>
                <th>Tanggal Pemesanan</th>
                <th>Jumlah Pesanan</th>
                <th>Total Harga</th>
               </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->nama_pemesan}}</td>
                <td>
                    {{$item->Produk}}
                    </td>
                <td>{{$item->tanggal}}</td>
                <td>{{$item->jumlah_pesanan}}</td>
                <td>{{$item->total}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection