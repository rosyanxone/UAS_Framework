<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        $provinsi = $request->get('Province');
        $kota = $request->get('city');
        $alamat = $request->get('addressOne');
        $nohp = $request->get('mobile');
        $jumlahBarang = $request->get('counts');

        if ($jumlahBarang > 0) {
            $id = Auth::user()->id;
            $carts = Keranjang::all()->where('pembeli_id', $id);
            $alamatLengkap = $provinsi . ', ' . $kota . '. ' . $alamat . '; ' . $nohp;

            foreach ($carts as $cart) {
                $produk = Produk::findOrFail($cart->produk->id);

                $sisaBarang = $produk->stok - $cart->jumlah_barang;
                $produk->update(['stok' => $sisaBarang]);

                $transaksi = new Transaksi([
                    "total_harga" => $cart->total_harga,
                    "jumlah_barang" => $cart->jumlah_barang,
                    "alamat" => $alamatLengkap,
                    "pembeli_id" => $id,
                    "penjual_id" => $cart->produk->penjual_id,
                    "produk_id" => $cart->produk->id,
                ]);
                $transaksi->save();
            }
            Keranjang::where('pembeli_id', $id)->delete();
            return redirect('/success');
        } else {
            return redirect('/keranjang');
        }
    }

    public function storeProduk(Produk $product)
    {
        $sisaBarang = $product->stok - 1;
        if ($sisaBarang >= 0) {
            $product->update(['stok' => $sisaBarang]);

            $transaksi = new Transaksi([
                "total_harga" => $product->harga,
                "jumlah_barang" => '1',
                "alamat" => Auth::user()->address,
                "pembeli_id" => Auth::user()->id,
                "penjual_id" => $product->penjual_id,
                "produk_id" => $product->id,
            ]);
            $transaksi->save();

            return redirect('/success');
        } else {
            return redirect("/show/$product->id");
        }
    }

    public function daftarTransaksi()
    {
        $id = Auth::user()->id;
		// $transaksi = DB::table('transactions')->where('pembeli_id', $id)->paginate(5);
        $transaksi = Transaksi::where('pembeli_id', $id)->paginate(5);
        $user = User::all()->where('id', $id)->first();
        $totalBarang = Transaksi::all()->where('pembeli_id', $id)->sum('jumlah_barang');
        $result = Keranjang::all()->where('pembeli_id', Auth::user()->id)->count();

        $totalPengeluaran = 0;
        $pajak = 1 / 100;
        foreach ($transaksi as $trans) {
            $totalPengeluaran += $trans->total_harga + ($trans->total_harga * $pajak);
        }

        return view('pembeli.checkout', [
            "total_pengeluaran" => $totalPengeluaran,
            "total_barang" => $totalBarang,
            "transactions" => $transaksi,
            "keranjang" => $result,
            "pajak" => $pajak,
            "user" => $user,
        ]);
    }

    public function penjual()
    {
        // $transactions = Transaksi::all()->where('penjual_id', Auth::user()->id);
        $transactions = Transaksi::where('penjual_id', Auth::user()->id)->paginate(4);
        $jumlahTransaksi = Transaksi::all()->where('penjual_id', Auth::user()->id)->count();
        $totalIncome = Transaksi::where('penjual_id', Auth::user()->id)->sum('total_harga');
        $jumlahCustomer = Transaksi::select('pembeli_id')->where('penjual_id', Auth::user()->id)->distinct()->get()->count();

        return view('penjual.home', [
            "transactions" => $transactions,
            "jumlah_transaksi" => $jumlahTransaksi,
            "total_income" => $totalIncome,
            "customer" => $jumlahCustomer,
        ]);
    }
}
