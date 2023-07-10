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

        Route::get('/pesanan', [App\Http\Controllers\Backend\PesananController::class, 'index']);
        Route::get('/pesanan/create', [App\Http\Controllers\Backend\PesananController::class, 'create']);
        Route::get('/pesanan/edit/{id}', [App\Http\Controllers\Backend\PesananController::class, 'edit']);
        Route::get('/pesanan/show/{id}', [App\Http\Controllers\Backend\PesananController::class, 'show']);
        Route::post('/pesanan/store', [App\Http\Controllers\Backend\PesananController::class, 'store']);
        Route::delete('/pesanan/destroy/{id}', [App\Http\Controllers\Backend\PesananController::class, 'destroy']);
        Route::put('/pesanan/update/{id}', [App\Http\Controllers\Backend\PesananController::class, 'update']);

        Route::get('/cart', [App\Http\Controllers\Backend\CartController::class, 'index']);
        Route::get('/cart/show/{id}', [App\Http\Controllers\Backend\CartController::class, 'show']);
        Route::delete('/cart/destroy/{id}', [App\Http\Controllers\Backend\CartController::class, 'destroy']);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//belum dimasukin ke khusus admin ya bang
Route::get('/user', [App\Http\Controllers\Backend\UserController::class, 'index']);
Route::get('/user/create', [App\Http\Controllers\Backend\UserController::class, 'create']);
Route::get('/user/edit/{id}', [App\Http\Controllers\Backend\UserController::class, 'edit']);
Route::get('/user/show/{id}', [App\Http\Controllers\Backend\UserController::class, 'show']);
Route::post('/user/store', [App\Http\Controllers\Backend\UserController::class, 'store']);
Route::delete('/user/destroy/{id}', [App\Http\Controllers\Backend\UserController::class, 'destroy']);
Route::put('/user/update/{id}', [App\Http\Controllers\Backend\UserController::class, 'update']);
