<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PesananController;
use App\Http\Controllers\Frontend\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route halaman frontend
Route::prefix('produk')->group(function() {
    Route::get('/', [ProdukController::class, 'index']);
    Route::get('cart', [CartController::class, 'index']);
    Route::get('cart/insert/{id}', [CartController::class, 'insert']);
    Route::get('cart/delete/{id}', [CartController::class, 'delete']);
});


Route::prefix('pesanan')->group(function() {
    Route::get('/', [PesananController::class, 'index']);
    Route::get('/form', [PesananController::class, 'get']);
    Route::post('/proses', [PesananController::class, 'create']);
});