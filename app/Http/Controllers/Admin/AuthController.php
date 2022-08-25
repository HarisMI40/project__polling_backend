<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        return $currentUser;
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => "invalid",
                'message' => "pastikan memasukan username dan passsword dengan benar"
            ], 422);
        }

        $credential = $request->only('username','password');
        $token = Auth::attempt($credential);
        if(!$token){
            return response()->json([
                'status' => "Error",
                'message' => "Login Gagal"
            ], 401);
        }

        return response()->json([
            'status' => "success",
            'data' => Auth::user(),
            'token' => $token
        ]);
    }

    public function register(Request $request)
    {
       $request->validate([
        'username' => "required",
        'password' => "required|string"
       ]);


       $user = User::create([
        'division_id' => $request->division_id,
        'username' => $request->username,
        'role' => 'user',
        'password' => Hash::make($request->password),
       ]);

       if(!$user){
        return response()->json([
            'status' => "error",
            'message' => "Register Gagal",
        ],401);
       }

       $token = Auth::login($user);
       return response()->json([
            'status' => "Success",
            'message' => "Register Berhasil",
            'token' => $token
        ]);

    }
}
