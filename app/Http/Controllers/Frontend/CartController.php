<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function index(){
        $total = DB::table('cart')->get()->count();
        session()->put('CartTotal', $total);

        $cart = DB::table('cart')
        ->join('produk', 'produk.id', '=', 'cart.produk_id')
        ->join('kategori_produk', 'kategori_produk.id', '=', 'produk.kategori_produk_id')
        ->select('produk.*', 'kategori_produk.nama AS Kategori', 'cart.total AS Total_Pesanan')
        ->get();

        return view('frontend/Cart/index', compact('cart'));
    }

    public function insert(int $id) {
        $cart = (array) DB::table('cart')->where('cart.produk_id', $id)->first();
        if (count($cart) > 0) {
            DB::table('cart')
            ->where('cart.produk_id', $id)
            ->increment('total', 1);
        }else{
            DB::table('cart')->insert([
                'cart.produk_id' => $id,
                'total' => 1,
                'users_id' => 2
            ]);
        }
        return redirect('/produk/cart');
    }

    public function delete(int $id){
        $data =  DB::table('cart')->where('cart.produk_id', '=', $id)->get();
         foreach ($data as $value) {
             if ($value->total > 1) {
                 DB::table('cart')
                 ->where('cart.produk_id', $id)
                 ->decrement('total', 1);
             }else{
                 DB::table('cart')->where('cart.produk_id', '=', $id)->delete();
             }
         }
 
         return redirect('/produk/cart');
     }
}
