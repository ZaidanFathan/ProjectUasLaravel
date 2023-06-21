<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahproduk = Produk::count();
        $jumlahkategori = KategoriProduk::count();
        $jumlahuser = User::count();
        $jumlahpesanan = Pesanan::count();
        $pesanan = Pesanan::whereMonth('tanggal', '=', date('m'))
            ->whereYear('tanggal', '=', date('Y'))
            ->latest('tanggal')
            ->limit(5)
            ->get();

        $labels = $pesanan->pluck('tanggal')->toArray();
        $data = $pesanan->pluck('total')->toArray();
        return view('Backend.index', compact('jumlahproduk', 'jumlahkategori', 'jumlahuser', 'jumlahpesanan', 'labels', 'data', "pesanan"));
    }
}
