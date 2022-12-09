<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function getKeranjang() {
        $carts = Keranjang::get();

        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil mengambil data Keranjang',
            'data' => $carts,
        ];

        return response()->json($respon);
    }
    
    public function keranjang($id){
        $cart = Keranjang::where('id', $id)->get();

        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil Mengambil data Keranjang',
            'data' => $cart,
        ];

        return response()->json($respon);
    }
    
    public function createKeranjang(Request $request){

        $cart = Keranjang::create([
            "total_harga" => $request->total_harga,
            "jumlah_barang" => $request->jumlah_barang,
            "pembeli_id" => $request->pembeli_id,
            "produk_id" => $request->produk_id,
        ]);
        
        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil Membuat data Keranjang',
            'data' => $cart,
        ];
        return response()->json($respon);
    }
}
