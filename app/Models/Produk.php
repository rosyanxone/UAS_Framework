<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    
    public function user() {
        // $role = Auth::user()->role == 'penjual' ? 'pembeli_id' : 'penjual_id';
        return $this->belongsTo(User::class, 'penjual_id');
    }
    public function Transaksi() {
        return $this->hasMany(Transaksi::class);
    }
    protected $table = 'products';
    protected $fillable = ['nama', 'harga', 'kategori', 'stok', 'gambar', 'deskripsi', 'penjual_id'];
}
