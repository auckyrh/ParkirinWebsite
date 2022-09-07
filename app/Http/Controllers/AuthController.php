<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nomor_hp' => 'required | numeric | unique:users',
            'role' => 'required | min:1',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'nama' => strtoupper($request['nama']),
            'email' => strtolower($request['email']),
            'nomor_hp' => $request['nomor_hp'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);

        return $user;
    }


    public function login (Request $request){

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
//            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return ['error' => 'The provided credentials are incorrect.'];
        }

//        return $user->createToken($request->device_name)->plainTextToken;

        return ['token' => $user->createToken('my-token')->plainTextToken];


    }
}
