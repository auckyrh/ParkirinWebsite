<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Lokasi;
use App\Models\Transaksi;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
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

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken], 201);
    }

    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'email atau password salah !'], 400);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

//        return response(['user' => auth()->user(), 'access_token'=> $accessToken],200);
        return response(['access_token'=> $accessToken->token, 'id' => auth()->user()->id],200);
    }

    public function logout(Request $request){

        $accessToken = $request->access_token;

    }


    public function getlokasi()
    {
        $lokasi = Lokasi::all();
        return response(['lokasi' => $lokasi, 'message' => 'Data berhasil ditampilkan'],200);
    }

    public function getkendaraan($iduser)
    {
        $kendaraan = Kendaraan::where('id_user', $iduser)->get();
        return response(['kendaraan' => $kendaraan],200); //, 'message' => 'Data berhasil ditampilkan'],200);
    }

    public function gettransaksi($iduser)
    {
        $transaksi = Transaksi::where('id_user', $iduser)->get();
        return response(['transaksi' => $transaksi, 'message' => 'Data berhasil ditampilkan'],200);
    }

    public function addkendaraan(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,[
            'plat_nomor' => 'required|alpha_num',
            'id_user' => 'required',
            'jenis_kendaraan' => 'required|alpha',
            'merk_model' => 'required',
        ]);

        if ($validator->fails()){
            return response(['error' => $validator->errors(),'Data tidak valid!']);
        }

        $kendaraan = Kendaraan::create($data);

        return  response(['kendaraan' => $kendaraan]); //, 'message'=>'Berhasil menambah kendaraan']);
    }

    public function showdetailkendaraan($plat_nomor){
        $kendaraan = Kendaraan::where('plat_nomor', $plat_nomor)->first();
        return response(['kendaraan' => $kendaraan]);
    }

    public function updatekendaraan(Request $request){
        $kendaraan = Kendaraan::where('plat_nomor', $request->plat_nomor)->update($request->all());

        return response(['kendaraan' => $kendaraan, 'message'=>'Berhasil update data kendaraan']);
    }

    public function deletekendaraan(Request $request){
        Kendaraan::where('plat_nomor', $request->plat_nomor)->delete();

        return response(['message'=>'Berhasil menghapus data kendaraan']);
    }

    public function addtransaksi(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,[
            'plat_nomor' => 'required|alpha_num',
            'id_user' => 'required',
            'id_lokasi' => 'required',
            'jenis_kendaraan' => 'required|alpha',
            'start_time' => 'required|date_format:Y-m-d H:i:s|after_or_equal:now()',
            'end_time' => 'required|date_format:Y-m-d H:i:s|',
            'durasi' => 'required|numeric',
            'biaya' => 'required|numeric',
            'status_pembayaran' => 'required|alpha',
            'status_transaksi' => 'required|alpha',
        ]);

        if ($validator->fails()){
            return response(['error' => $validator->errors(),'Data tidak valid!']);
        }

        $transaksi = Transaksi::create($data);

        return  response(['kendaraan' => $transaksi, 'message'=>'Berhasil membuat transaksi']);
    }

}
