<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role' => 'penjual',
                'name' => 'Rausyanfikr Karmayoga',
                'address' => 'Jl. Abdul W. Syahranie Gg 555',
                'number' => '081351580524',
                'image' => 'nama-panjang-w41g.jpg',
                'is_store' => 'Shian Store',
                'email' => 'rausyanfikrkarmayoga@gmail.com',
                'password' => '123'
            ],
            [
                'role' => 'penjual',
                'name' => 'Asep Harahap',
                'address' => 'Jl. Juanda 7 No 5',
                'number' => '0824561727383',
                'image' => 'nama-panjang-w41g.jpg',
                'is_store' => 'Listrik Biru',
                'email' => 'asep@gmail.com',
                'password' => '123'
            ],
            [
                'role' => 'pembeli',
                'name' => 'Vanny Putri',
                'address' => 'Jl. Juanda 7 No 5',
                'number' => '0824561727383',
                'image' => 'nama-panjang-w41g.jpg',
                'is_store' => 'false',
                'email' => 'vannyputriandrini@gmail.com',
                'password' => '123'
            ],
            [
                'role' => 'pembeli',
                'name' => 'Rosyan Xone',
                'address' => 'Jl. Abdul W. Syahranie Gg 555',
                'number' => '081351580524',
                'image' => 'nama-panjang-w41g.jpg',
                'is_store' => 'false',
                'email' => 'rosyanxone@student.unmul.ac.id',
                'password' => '123'
            ],
        ];
        
        foreach($users as $user) {
            User::create([
                'role' => $user["role"],
                'name' => $user["name"],
                'address' => $user["address"],
                'number' => $user["number"],
                'image' => $user["image"],
                'is_store' => $user["is_store"],
                'email' => $user["email"],
                'password' => Hash::make($user["password"])
            ]);
        }
    }
}
