<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class ProdukController extends Controller
{
    public function __construct() {
        $total = DB::table('cart')->get()->count();
        session()->put('CartTotal', $total);
    }

    public function index()  {
        $produk = DB::table('produk')
        ->join('kategori_produk', 'kategori_produk.id', '=', 'produk.kategori_produk_id')
        ->select('produk.*', 'kategori_produk.nama AS Kategori')
        ->get();


        return view('frontend.Produk.index', compact('produk'));
    }
}
