<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('User.masterUser',[
            'user'=> $user
        ]);
    }

    public function filter($role)
    {

        if ($role)
            $user = User::where('role', $role)->get();

        return view('User.masterUser',[
            'user'=> $user
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required | max:255',
            'nomor_hp' => 'required | numeric | unique:users',
            'email' => 'required | email | unique:users',
            'role' => 'required | min:1',
            'password' => 'required',
            'password-confirm' => 'required',
        ];

        $customError = [
            'alpha' => 'Tidak boleh mengandung angka!',
        ];

        $this->validate($request,$rules,$customError);

        $nama = $request->input('nama');
        $email = $request->input('email');
        $nomor_hp = $request->input('nomor_hp');
        $role = $request->input('role');
        $password = $request->input('password');
        $status = "Pending";


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('User.detailUser',[
            'user'=> $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
