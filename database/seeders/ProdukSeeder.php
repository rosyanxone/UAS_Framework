<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB:table

        $produks = [
            [
                'nama' => 'Apple Watch 4',
                'harga' => '1890000',
                'kategori' => 'elektronik',
                'stok' => '5',
                'gambar' => 'products-apple-watch.jpg',
                'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor amet quisquam quaerat sequi saepe doloremque, at accusantium quasi.',
                'penjual_id' => '1'
            ],
            [
                'nama' => 'Orange Bogotta',
                'harga' => '94509',
                'kategori' => 'kecantikan',
                'stok' => '0',
                'gambar' => 'products-orange-bogotta.jpg',
                'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor amet quisquam quaerat sequi saepe doloremque, at accusantium quasi.',
                'penjual_id' => '1'
            ],
            [
                'nama' => 'Sofa Ternyaman',
                'harga' => '114409',
                'kategori' => 'perabotan',
                'stok' => '5',
                'gambar' => 'products-sofa-ternyaman.jpg',
                'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor amet quisquam quaerat sequi saepe doloremque, at accusantium quasi.',
                'penjual_id' => '1'
            ],
            [
                'nama' => 'Bubuk Maketti',
                'harga' => '22500',
                'kategori' => 'kecantikan',
                'stok' => '5',
                'gambar' => 'products-bubuk-maketti.jpg',
                'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor amet quisquam quaerat sequi saepe doloremque, at accusantium quasi.',
                'penjual_id' => '1'
            ],
            [
                'nama' => 'Tatakan Gelas',
                'harga' => '41584',
                'kategori' => 'perabotan',
                'stok' => '5',
                'gambar' => 'products-tatakan-gelas.jpg',
                'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor amet quisquam quaerat sequi saepe doloremque, at accusantium quasi.',
                'penjual_id' => '2'
            ],
            [
                'nama' => 'Mavic Kawe',
                'harga' => '5897803',
                'kategori' => 'elektronik',
                'stok' => '5',
                'gambar' => 'products-mavic-kawe.jpg',
                'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor amet quisquam quaerat sequi saepe doloremque, at accusantium quasi.',
                'penjual_id' => '2'
            ],
            [
                'nama' => 'Black Edition Nike',
                'harga' => '700482',
                'kategori' => 'pakaian',
                'stok' => '5',
                'gambar' => 'products-black-edition-nike.jpg',
                'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor amet quisquam quaerat sequi saepe doloremque, at accusantium quasi.',
                'penjual_id' => '2'
            ],
            [
                'nama' => 'Monkey Toys',
                'harga' => '71883',
                'kategori' => 'perabotan',
                'stok' => '5',
                'gambar' => 'products-monkey-toys.jpg',
                'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor amet quisquam quaerat sequi saepe doloremque, at accusantium quasi.',
                'penjual_id' => '2'
            ],
        ];
        
        foreach($produks as $produk) {
            \App\Models\Produk::firstOrCreate($produk);
        }
    }
}
