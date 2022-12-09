<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function getUsers() {
        $users = User::get();

        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil mengambil data User',
            'data' => $users,
        ];

        return response()->json($respon);
    }
    
    public function user($id){
        $user = User::where('id', $id)->get();

        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil Mengambil data User',
            'data' => $user,
        ];

        return response()->json($respon);
    }
    
    public function createUser(Request $request){

        $user = User::create([
            "role" => $request->role,
            "name" => $request->name,
            "email" => $request->email,
            "number" => $request->number,
            "image" => $request->image,
            "is_store" => $request->is_store,
            "address" => $request->address,
            "password" => Hash::make($request->password)
        ]);
        
        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil Membuat data User',
            'data' => $user,
        ];
        return response()->json($respon);
    }
}
