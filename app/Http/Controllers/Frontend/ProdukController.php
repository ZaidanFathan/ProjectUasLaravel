<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class ProdukController extends Controller
{
    public function index()  {
        $total = DB::table('cart')->where('users_id', Auth::user()->id)->get()->count();
        session()->put('CartTotal', $total);

        $produk = DB::table('produk')
        ->join('kategori_produk', 'kategori_produk.id', '=', 'produk.kategori_produk_id')
        ->select('produk.*', 'kategori_produk.nama AS Kategori')
        ->get();


        return view('frontend.Produk.index', compact('produk'));
    }
}
