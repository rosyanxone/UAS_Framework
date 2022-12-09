<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


// AUTHENTICATION
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/action-register', [AuthController::class, 'actionRegister']);

Route::get('/login', function () {
    return view('auth.login');
})->name("login");
Route::post('/action-login', [AuthController::class, 'actionLogin']);

Route::get('/logout', [AuthController::class, 'logout']);
// END AUTHENTICATION


// PEMBELI
Route::get('/', [KeranjangController::class, 'keranjangCount'])->name('pembeli.home');
Route::get('/kategori/{produk}', [KeranjangController::class, 'keranjangCount'])->name('pembeli.home.kategori');

Route::get('/show/{id}', [ProdukController::class, 'show'])->name('show')->middleware('auth');
Route::post('/show/{product}/add', [KeranjangController::class, 'keranjang'])->name('show.add')->middleware('auth');
Route::get('/show/{product}/checkout', [TransaksiController::class, 'storeProduk'])->name('show.checkout')->middleware('auth');

Route::get('/keranjang', [KeranjangController::class, 'pembeli'])->name('pembeli.keranjang')->middleware('auth');
Route::get('/keranjang/delete/{id}', [KeranjangController::class, 'destroy'])->name('pembeli.keranjang.delete')->middleware('auth');
Route::post('/keranjang/checkout', [TransaksiController::class, 'store'])->name('pembeli.keranjang.checkout')->middleware('auth');

Route::get('/user', [TransaksiController::class, 'daftarTransaksi'])->name('user.transaksi')->middleware('auth');
Route::post('/user/action-pwd', [AuthController::class, 'updatePassword'])->name('user.update.pwd')->middleware('auth');
Route::put('/user/action-data', [AuthController::class, 'updateData'])->name('user.update.data')->middleware('auth');

Route::get('/success', function() {
    return view('pembeli.success');
})->name('pembeli.success')->middleware('auth');
// END PEMBELI


// PENJUAL
Route::get('/penjual', [TransaksiController::class, 'penjual'])->name('penjual.home')->middleware('auth');
Route::get('/penjual/user', [AuthController::class, 'penjualProfile'])->name('penjual.user')->middleware('auth');

Route::get('/produk', function () {
    return view('penjual.produk', ["products" => Produk::all()->where('penjual_id', Auth::user()->id)]);
})->name('produk');

Route::get('/produk/create', [ProdukController::class, 'create'])->name('penjual.create')->middleware('auth');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('penjual.store')->middleware('auth');

Route::get('/update/{produk}', [ProdukController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/{id}', [ProdukController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('delete')->middleware('auth');
// END PENJUAL