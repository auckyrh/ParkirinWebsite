<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use illuminate\Support\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => ['api']], function() {

    Route::post('/register',[ApiController::class,'register']);
    Route::post('/login',[ApiController::class,'login']);

    Route::get('/getlokasi',[ApiController::class,'getlokasi']);

    Route::get('/getkendaraan/{iduser}',[ApiController::class,'getkendaraan']);
    Route::post('/addkendaraan',[ApiController::class,'addkendaraan']);
    Route::get('/showdetailkendaraan/{plat_nomor}',[ApiController::class,'showdetailkendaraan']);
    Route::put('/updatekendaraan',[ApiController::class,'updatekendaraan']);
    Route::delete('/deletekendaraan',[ApiController::class,'deletekendaraan']);

    Route::get('/gettransaksi/{iduser}',[ApiController::class,'gettransaksi']);
    Route::post('/addtransaksi',[ApiController::class,'addtransaksi']);





});

