<?php

use App\Http\Controllers\DendaController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/', function () {
    return view('welcome');
});

//user management
Auth::routes(['verify' => true]);

//user
Route::get('/masterUser',[UserController::class,'index']);
Route::get('/masterUser/{role}',[UserController::class,'filter']);
Route::get('/detailUser/{id}',[UserController::class,'show']);
Route::post('/editUser',[UserController::class,'editUser']);


//kendaraan
Route::get('/masterKendaraan',[KendaraanController::class,'index']);
Route::get('/tambahKendaraan',[KendaraanController::class,'create']);
Route::post('/addKendaraan',[KendaraanController::class,'addKendaraan']);
Route::post('/detailKendaraan',[KendaraanController::class,'detailKendaraan']);
Route::post('/editKendaraan',[KendaraanController::class,'editKendaraan']);
Route::post('/hapusKendaraan',[KendaraanController::class,'hapusKendaraan']);

//lokasi
Route::get('/masterLokasi',[LokasiController::class,'index']);
Route::post('/masterLokasi',[LokasiController::class,'index'])->name("masterLokasi");
Route::get('/tambahLokasi',[LokasiController::class,'create']);
Route::post('/addLokasi',[LokasiController::class,'store']);
Route::get('/detailLokasi',[LokasiController::class,'show']);
Route::post('/detailLokasi',[LokasiController::class,'show'])->name("detailLokasi");
Route::post('/editLokasi',[LokasiController::class,'edit']);

//favorit
Route::get('/masterFavorit',[FavoritController::class,'index']);
Route::post('/addFavorit',[FavoritController::class,'addFavorit']);
Route::post('/hapusFavorit',[FavoritController::class,'hapusFavorit']);

//transaksi
Route::get('/masterTransaksi',[TransaksiController::class,'index']);
Route::get('/tambahTransaksi',[TransaksiController::class,'create']);
Route::post('/addTransaksi',[TransaksiController::class,'addTransaksi']);
Route::post('/detailTransaksi',[TransaksiController::class,'detailTransaksi']);
Route::post('/checkinTransaksi',[TransaksiController::class,'checkinTransaksi']);
Route::post('/checkoutTransaksi',[TransaksiController::class,'checkoutTransaksi']);

//denda
Route::get('/masterDenda',[DendaController::class,'index']);
Route::get('/tambahDenda',[DendaController::class,'create']);
Route::post('/addTransaksi',[DendaController::class,'store']);
Route::post('/detailDenda',[DendaController::class,'show']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
