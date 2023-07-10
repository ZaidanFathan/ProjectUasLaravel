<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Controllers\Controller;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategori = KategoriProduk::all();
        return view('Backend.Kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = KategoriProduk::all();
        return view('Backend.Kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        KategoriProduk::create($validated);
        return redirect('/admin/kategori/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kategori= KategoriProduk::find($id);
        return view('Backend.kategori.show',  compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kategori = KategoriProduk::find($id);
        return view('Backend.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        KategoriProduk::where('id', $id)->update($validated);
        return redirect('/admin/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        KategoriProduk::destroy($id);
        return redirect('/admin/kategori');
    }
}
