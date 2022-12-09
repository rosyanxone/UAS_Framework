<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function getTransaksi() {
        $transactions = Transaksi::get();

        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil mengambil data Transaksi',
            'data' => $transactions,
        ];

        return response()->json($respon);
    }
    
    public function transaksi($id){
        $transaction = Transaksi::where('id', $id)->get();

        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil Mengambil data Transaksi',
            'data' => $transaction,
        ];

        return response()->json($respon);
    }
    
    public function createTransaksi(Request $request){

        $transaction = Transaksi::create([
            "total_harga" => $request->total_harga,
            "jumlah_barang" => $request->jumlah_barang,
            "alamat" => $request->alamat,
            "penjual_id" => $request->penjual_id,
            "pembeli_id" => $request->pembeli_id,
            "produk_id" => $request->produk_id
        ]);
        
        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil Membuat data Transaksi',
            'data' => $transaction,
        ];
        return response()->json($respon);
    }
}
