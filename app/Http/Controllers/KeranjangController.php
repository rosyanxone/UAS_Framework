<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function keranjang(Produk $product, Request $request)
    {
        $cart = Keranjang::all()->where('pembeli_id', Auth::user()->id)->where('produk_id', $product->id)->first();
        $jumlBrg = $request->get('barang');

        if($jumlBrg > 0) {
            if ($cart) {
                if($cart->jumlah_barang + $jumlBrg > $product->stok) {
                    session()->flash('error', 'Produk Gagal Ditambah ke Keranjang!');
                    return redirect("/show/$product->id");
                } else {
                    $totlHrg = $cart->total_harga + $product->harga * $jumlBrg;
                    $jumlBrg += $cart->jumlah_barang;
    
                    $cart->update([
                        'total_harga' => $totlHrg,
                        'jumlah_barang' => $jumlBrg
                    ]);
                }
            } else {
                Keranjang::create([
                    'total_harga' => $product->harga*$jumlBrg,
                    'jumlah_barang' => $jumlBrg,
                    'produk_id' => $product->id,
                    'pembeli_id' => Auth::user()->id
                ]);
            }

            session()->flash('success', 'Berhasil Ditambah ke Keranjang!');
        } else {
            session()->flash('error', 'Gagal Ditambah ke Keranjang!');
        }
        return redirect("/show/$product->id");
    }

    public function keranjangCount($kategori = '') {
        $result = 0;
        if(Auth::user()) {
            $result = Keranjang::all()->where('pembeli_id', Auth::user()->id)->count();
        }

		$query = DB::table('products')->paginate(8);
        if(strlen($kategori) > 0) {
            $query = DB::table('products')->where('kategori', $kategori)->paginate(8);
        }

        return view('pembeli.home', [
            "products" => $query,
            "keranjang" => $result,
        ]);
    }

    public function pembeli()
    {
        $idUser = Auth::user()->id;

        $keranjangs = Keranjang::all()->where('pembeli_id', $idUser);
        $totalHarga = Keranjang::all()->where('pembeli_id', $idUser)->sum('total_harga');
        $biayaAdmin = round($totalHarga * 1 / 100);
        $totalHarga += $biayaAdmin;
        $totalProduk = Keranjang::all()->where('pembeli_id', $idUser)->count();
        $dataUser = User::select('id', 'number', 'address')->where('id', $idUser)->get('number')->first();

        return view('pembeli.keranjang', [
            "keranjangs" => $keranjangs,
            "total_harga" => $totalHarga,
            "biaya_admin" => $biayaAdmin,
            "total_produk" => $totalProduk,
            "nohp_user" => $dataUser['number'],
            "alamat_user" => $dataUser['address'],
            "id_user" => $dataUser['id'],
        ]);
    }

    public function destroy($id)
    {
        $cart = Keranjang::findOrFail($id);
        if ($cart->jumlah_barang > 1) {
            $cart->update([
                'total_harga' => $cart->total_harga - $cart->produk->harga,
                'jumlah_barang' => $cart->jumlah_barang - 1
            ]);
        } else {
            $cart->delete();
        }

        return redirect('/keranjang')->with('del-success', 'Produk berhasil dihapus');
    }
}
