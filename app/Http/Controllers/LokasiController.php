<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokasiController extends Controller
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
            $lokasi = Lokasi::all();
        }
        else {
            $lokasi = Lokasi::where('id_pemilik', Auth::id())->get();
        }

        return view('Lokasi.masterLokasi',[
            'lokasi'=> $lokasi,
            'message'=> $message,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Lokasi.tambahLokasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
//        return $request->file('foto_path')->store('foto-lokasi');

        $rules = [
            'nama' => 'required | max:255',
            'alamat' => 'required | max:255',
            'foto_path' => 'required|image|file|max:10240',
            'latitude' => 'required',
            'longitude' => 'required',
            'kapasitasmax_mobil' => 'required | numeric | min:0',
            'kapasitasmax_motor' => 'required | numeric | min:0',
            'biaya_mobil' => 'required | numeric | min:0',
            'biaya_motor' => 'required | numeric | min:0',
        ];

        $customError = [
            'alpha' => 'Tidak boleh mengandung angka!',
        ];

        $this->validate($request,$rules,$customError);

        $id_pemilik = Auth::id();
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $foto_path = $request->file('foto_path')->store('foto-lokasi');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $kapasitasmax_mobil = $request->input('kapasitasmax_mobil');
        $kapasitasmax_motor = $request->input('kapasitasmax_motor');
        $biaya_mobil = $request->input('biaya_mobil');
        $biaya_motor = $request->input('biaya_motor');

        Lokasi::create([
            'id_pemilik' => $id_pemilik,
            'nama' => $nama,
            'alamat' => $alamat,
            'foto_path' => $foto_path,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'kapasitasmax_mobil' => $kapasitasmax_mobil,
            'kapasitasmax_motor' => $kapasitasmax_motor,
            'biaya_mobil' => $biaya_mobil,
            'biaya_motor' => $biaya_motor,
        ]);

        return redirect()->route('masterLokasi', ['message' => 'Berhasil mendaftarkan lokasi']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id_lokasi = $request->input('id');
        $lokasi = Lokasi::where('id',$id_lokasi)->first();
        $message = $request->input('message');

        return view('Lokasi.detailLokasi',[
            'lokasi'=> $lokasi,
            'message'=> $message,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $rules = [
            'kapasitasmax_mobil' => 'required | numeric | min:0',
            'kapasitasmax_motor' => 'required | numeric | min:0',
            'biaya_mobil' => 'required | numeric | min:0',
            'biaya_motor' => 'required | numeric | min:0',
        ];

        $customError = [
            'alpha' => 'Tidak boleh mengandung angka!',
        ];

        $this->validate($request,$rules,$customError);

        $id_lokasi = $request->input('id');
        $kapasitasmax_mobil = $request->input('kapasitasmax_mobil');
        $kapasitasmax_motor = $request->input('kapasitasmax_motor');
        $biaya_mobil = $request->input('biaya_mobil');
        $biaya_motor = $request->input('biaya_motor');

        $lokasi = Lokasi::findOrFail($id_lokasi);
        $lokasi->kapasitasmax_mobil = $kapasitasmax_mobil;
        $lokasi->kapasitasmax_motor = $kapasitasmax_motor;
        $lokasi->biaya_mobil = $biaya_mobil;
        $lokasi->biaya_motor = $biaya_motor;
        $lokasi->save();

        return redirect()->route('detailLokasi', ['id' => $id_lokasi, 'message' => 'Data berhasil tersimpan']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        //
    }
}
