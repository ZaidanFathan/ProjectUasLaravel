<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
// use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index() {
        $data = DB::table('pesanan')
        ->join('produk', 'produk.id', '=', 'pesanan.produk_id')
        ->select('produk.nama AS Produk', 'pesanan.*')
        ->where('users_id', Auth::user()->id)
        ->get();
        return view('Frontend.Pesanan.index', compact('data'));
    }

    public function get(){
        $data =DB::table('cart')
        ->join('produk', 'produk.id', '=', 'cart.produk_id')
        ->join('kategori_produk', 'kategori_produk.id', '=', 'produk.kategori_produk_id')
        ->select('produk.*', 'kategori_produk.nama AS Kategori', 'cart.total AS Total_Pesanan')
        ->where("users_id", Auth::user()->id)
        ->get();

        return view('Frontend.Pesanan.form', compact('data'));
    }

    public function create(Request $request) {
        $TotalHarga = 0;
        $cart = DB::table('cart')
        ->join('produk', 'produk.id', '=', 'cart.produk_id')
        ->join('kategori_produk', 'kategori_produk.id', '=', 'produk.kategori_produk_id')
        ->select('produk.*', 'kategori_produk.nama AS Kategori', 'cart.total AS Total_Pesanan', 'cart.id AS IdCart')
        ->where("users_id", Auth::user()->id)
        ->get();
        
        foreach ($cart as $value) {
         $TotalHarga += ($value->harga_jual * $value->Total_Pesanan) + 25000;
        DB::table('pesanan')->insert([
            'tanggal' => $request->tanggal,
            'nama_pemesan' => $request->nama_pemesan,
            'alamat_pemesan' => $request->alamat_pemesan,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'jumlah_pesanan' => $value->Total_Pesanan,
            'deskripsi' => $request->deskripsi,
            'produk_id' => $value->id,
            'total' => $TotalHarga,
            'users_id' => Auth::user()->id
        ]);
        $TotalHarga = 0;
        DB::table('cart')->where('id', '=', $value->IdCart)->where('users_id', Auth::user()->id)->delete();
    }


    return redirect('pesanan/');
    }
}
