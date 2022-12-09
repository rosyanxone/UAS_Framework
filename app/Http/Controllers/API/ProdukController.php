<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function getProduk() {
        $products = Produk::get();

        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil mengambil data Produk',
            'data' => $products,
        ];

        return response()->json($respon);
    }
    
    public function produk($id){
        $product = Produk::where('id', $id)->get();

        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil Mengambil data Produk',
            'data' => $product,
        ];

        return response()->json($respon);
    }
    
    public function createProduk(Request $request){

        $product = Produk::create([
            "nama" => $request->nama,
            "harga" => $request->harga,
            "kategori" => $request->kategori,
            "gambar" => $request->gambar,
            "stok" => $request->stok,
            "deskripsi" => $request->deskripsi,
            "penjual_id" => $request->penjual_id
        ]);
        
        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil Membuat data produk',
            'data' => $product,
        ];
        return response()->json($respon);
    }
}
