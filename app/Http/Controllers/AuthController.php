<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function penjualProfile() {
        $totalIncome = Transaksi::where('penjual_id', Auth::user()->id)->sum('total_harga');
        $totalProduk = Produk::distinct()->get()->where('penjual_id', Auth::user()->id)->count();

        return view('penjual.user', [
            "user" => User::all()->where('id', Auth::user()->id)->first(),
            "total_income" => $totalIncome,
            "total_produk" => $totalProduk
        ]);
    }
    public function actionRegister(Request $request)
    {
        if ($request->password == $request->confirm_password) {

            $filename = 'nama-panjang-w41g.jpg';
            if ($request->hasFile('file')) {
                $slug = Str::slug($request->get('name'), '-');
                $randstr = Str::lower(Str::random(4));
                $file = $request->file('file');
                $filename = $slug . '-' . $randstr . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img/profile'), $filename);
            }

            User::create([
                'role' => $request->is_store_open,
                'name' => $request->name,
                'address' => $request->addressOne,
                'number' => $request->mobile,
                'image' => $filename,
                'is_store' => $request->nama_toko,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            session()->flash('success', 'Berhasil Membuat Akun!');
            return redirect('/login');
        } else {
            session()->flash('error', 'Konfirmasi password anda berbeda!');
            return redirect('/register');
        }
    }

    public function updateData(Request $request) {
        $user = User::all()->where('id', Auth::user()->id)->first();
        
        $filename = $user->image;
        if ($request->hasFile('file')) {
            $slug = Str::slug($request->get('name'), '-');
            $randstr = Str::lower(Str::random(5));
            $file = $request->file('file');
            $filename = $slug . '-' . $randstr . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/profile'), $filename);
        }

        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'number' => $request->mobile,
            'image' => $filename,
            'is_store' => $request->store,
            'email' => $request->email,
        ]);

        session()->flash('success', 'Berhasil Merubah Data Akun!');
        return redirect("$request->role_route");
    }

    public function updatePassword(Request $request) {
        if (Hash::check($request->password_old, auth()->user()->password)) {
            if ($request->password_new == $request->password_confirm) {
                $user = User::all()->where('id', Auth::user()->id)->first();
                $user->update(['password' => Hash::make($request->password_new)]);
                
                session()->flash('success', 'Berhasil merubah password!');
            } else {
                session()->flash('error', 'Konfirmasi password anda berbeda!');
            }
        } else {
            session()->flash('error', 'Password lama anda salah!');
        }
        return redirect("$request->role_route");
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::Attempt($data)) {
            $role = Auth::user()->role;

            if($role == 'pembeli') {
                return redirect('/');
            } elseif($role == 'penjual') {
                return redirect("/penjual");
            }
        } else {
            session()->flash('error', 'Email atau Password Salah');

            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('success-logout', 'Berhasil Logout');
        return redirect('/login');
    }
}
