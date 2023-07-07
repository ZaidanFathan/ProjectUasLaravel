<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\support\facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pesanan = Pesanan::all();
        return view('Backend.pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Backend.pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'tanggal' => 'required|max:10',
            'nama_pemesan' => 'required',
            'alamat_pemesan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'jumlah_pesanan' => 'required',
            'deskripsi' => 'required',
            'produk_id' => 'required',
        ]);
        Pesanan::create($validated);
        return redirect('/admin/pesanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pesanan = Pesanan::find($id);
        return view('Backend.pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pesanan = Pesanan::find($id);
        return view('Backend.pesanan.edit', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'tanggal' => 'required',
            'nama_pemesan' => 'required',
            'alamat_pemesan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'jumlah_pesanan' => 'required',
            'deskripsi' => 'required',
            'produk_id' => 'required',
        ]);
        Pesanan::where('id', $id)->update($validated);
        return redirect('/admin/pesanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Pesanan::destroy($id);
        return redirect('/admin/pesanan');
    }
}
