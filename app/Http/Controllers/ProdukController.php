<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function create()
    {
        $id = Auth::user()->id;
        return view('penjual.create', ["id" => $id]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama" => 'required|string',
            "harga" => 'required|string',
            "kategori" => 'required|string',
            "stok" => 'required|string',
            "deskripsi" => 'required|string',
            "penjual_id" => 'required',
        ]);

        $slug = Str::slug($request->get('nama'), '-');
        $randstr = Str::lower(Str::random(5));
        $file = $request->file('file');
        $filename = 'products-' . $slug . '-' . $randstr . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img/products'), $filename);

        $product = new Produk([
            "nama" => $request->get('nama'),
            "harga" => $request->get('harga'),
            "kategori" => $request->get('kategori'),
            "gambar" => $filename,
            "stok" => $request->get('stok'),
            "deskripsi" => $request->get('deskripsi'),
            "penjual_id" => $request->get('penjual_id')
        ]);
        $product->save();

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
    }
    
    public function show(Produk $id) {
        return view('pembeli.show', [
            'product' => $id,
            'keranjang' => Keranjang::all()->where('pembeli_id', Auth::user()->id)->count(),
        ]);
    }
    
    public function edit(Produk $produk) {
        return view('penjual.update', [
            'product' => $produk,
        ]);
    }

    public function success() {
        return view('pembeli.success');
    }
    
    public function update(Request $request, $id) {
        $produk = Produk::findOrFail($id);

        $filename = $produk->gambar;
        if ($request->hasFile('file')) {
            $slug = Str::slug($request->get('nama'), '-');
            $randstr = Str::lower(Str::random(5));
            $file = $request->file('file');
            $filename = 'products-' . $slug . '-' . $randstr . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/products'), $filename);
            $produk->update(['gambar' => $filename]);
        }

        $validateData = $request->validate([
            "nama" => 'required|string',
            "harga" => 'required|string',
            "kategori" => 'required|string',
            "stok" => 'required|string',
            "deskripsi" => 'required|string',
            "penjual_id" => 'required',
        ]);
        $produk->update($validateData);

        return redirect("/produk")->with('success', 'Produk berhasil diubah');
    }
    
    public function destroy($id) {
        $produk = Produk::findOrFail($id);
        $transaksi = Transaksi::where('produk_id', $produk->id)->first();
        if($produk->stok == 0 || $transaksi) {
            return redirect('/produk')->with('error', 'Produk tidak dapat dihapus');
        } else {
            $produk->delete();
            return redirect('/produk')->with('success', 'Produk berhasil dihapus');
        }
    }
}

