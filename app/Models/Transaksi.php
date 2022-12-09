<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaksi extends Model
{
    use HasFactory;
    
    public function produk() {
        return $this->belongsTo(Produk::class);
    }
    public function user() {
        $role = Auth::user()->role == 'penjual' ? 'pembeli_id' : 'penjual_id';
        return $this->belongsTo(User::class, $role);
    }

    protected $table = 'transactions';
    protected $fillable = ['total_harga', 'jumlah_barang', 'alamat', 'pembeli_id', 'penjual_id', 'produk_id'];
}
