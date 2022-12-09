<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    
    public function produk() {
        return $this->belongsTo(Produk::class);
    }
    public function user() {
        return $this->belongsTo(User::class, 'pembeli_id');
    }

    protected $table = 'carts';
    protected $fillable = ['total_harga', 'jumlah_barang', 'produk_id', 'pembeli_id'];
}
