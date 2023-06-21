<?php
use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware' => ['auth', 'role:user']], function() {
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
});



Auth::routes();
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'index']);
        Route::get('/produk', [App\Http\Controllers\Backend\ProdukController::class, 'index']);
        Route::get('/produk/create', [App\Http\Controllers\Backend\ProdukController::class, 'create']);
        Route::get('/produk/edit/{id}', [App\Http\Controllers\Backend\ProdukController::class, 'edit']);
        Route::get('/produk/show/{id}', [App\Http\Controllers\Backend\ProdukController::class, 'show']);
        Route::post('/produk/store', [App\Http\Controllers\Backend\ProdukController::class, 'store']);
        Route::delete('/produk/destroy/{id}', [App\Http\Controllers\Backend\ProdukController::class, 'destroy']);
        Route::put('/produk/update/{id}', [App\Http\Controllers\Backend\ProdukController::class, 'update']);
    });
});
