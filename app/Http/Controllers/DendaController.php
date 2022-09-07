<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $message = $request->input('message');

        $user = User::select('role')->where('id',Auth::id())->first();
        if ($user->role=="Admin"){
            $denda = Denda::all();
        }
        else {
            $denda = Denda::where('id_operator', Auth::id())->get();
        }

        return view('Denda.masterDenda',[
            'denda'=> $denda,
            'message'=> $message,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Denda.tambahDenda');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function show(Denda $denda)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function edit(Denda $denda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denda $denda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denda $denda)
    {
        //
    }
}
