<?php

use App\Http\Controllers\API\KeranjangController;
use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\API\TransaksiController;
use App\Http\Controllers\API\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/produk', [ProdukController::class, 'getProduk']);
Route::get('/produk/{id}', [ProdukController::class, 'produk']);
Route::post('/produk/create', [ProdukController::class, 'createProduk']);

Route::get('/keranjang', [KeranjangController::class, 'getKeranjang']);
Route::get('/keranjang/{id}', [KeranjangController::class, 'keranjang']);
Route::post('/keranjang/create', [KeranjangController::class, 'createKeranjang']);

Route::get('/transaksi', [TransaksiController::class, 'getTransaksi']);
Route::get('/transaksi/{id}', [TransaksiController::class, 'transaksi']);
Route::post('/transaksi/create', [TransaksiController::class, 'createTransaksi']);

Route::get('/user', [UsersController::class, 'getUsers']);
Route::get('/user/{id}', [UsersController::class, 'user']);
Route::post('/user/create', [UsersController::class, 'createUser']);