<?php

namespace App\Http\Controllers\Backend;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('Backend.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_produk = KategoriProduk::all();
        return view('Backend.produk.create', compact('kategori_produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'kode' => 'required|max:10',
            'nama' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
            'min_stok' => 'required',
            'deskripsi' => 'required',
            'kategori_produk_id' => 'required',
            'img' => 'required'
        ]);
        Produk::create($validated);
        return redirect('/admin/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::find($id);
        return view('Backend.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori_produk = KategoriProduk::all();
        $produk = Produk::find($id);
        return view('Backend.produk.edit', compact('produk', 'kategori_produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode' => 'required|max:10',
            'nama' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
            'min_stok' => 'required',
            'deskripsi' => 'required',
            'kategori_produk_id' => 'required',
            'img' => 'required'
        ]);
        Produk::where('id', $id)->update($validated);
        return redirect('/admin/produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::destroy($id);
        return redirect('/admin/produk');
    }
}
