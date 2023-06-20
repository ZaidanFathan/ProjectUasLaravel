<?php
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
    Route::get('/', [App\Http\Controllers\Frontend\ProdukController::class, 'index']);
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('cart/insert/{id}', [App\Http\Controllers\Frontend\CartController::class, 'insert']);
    Route::get('cart/delete/{id}', [App\Http\Controllers\Frontend\CartController::class, 'delete']);
});


Route::prefix('pesanan')->group(function() {
    Route::get('/', [App\Http\Controllers\Frontend\PesananController::class, 'index']);
    Route::get('/form', [App\Http\Controllers\Frontend\PesananController::class, 'get']);
    Route::post('/proses', [App\Http\Controllers\Frontend\PesananController::class, 'create']);
});