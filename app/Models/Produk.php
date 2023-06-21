<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $fillable = [
        'kode',
        'nama',
        'harga_jual',
        'harga_beli',
        'stok',
        'min_stok',
        'deskripsi',
        'kategori_produk_id',
        'img'
    ];
    public $timestamps = false;
    public function KategoriProduk(){
        return $this->belongsTo(KategoriProduk::class);
    }

    public function Cart() {
        return $this->hasMany(Cart::class);
    }

    public function Pesanan() {
        return $this->hasMany(Pesanan::class);
    }
}
