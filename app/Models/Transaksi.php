<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'transaksi';
    public $timestamps = true;
    protected $fillable = [
        'plat_nomor',
        'id_user',
        'id_lokasi',
        'jenis_kendaraan',
        'start_time',
        'end_time',
        'durasi',
        'biaya',
        'status_pembayaran',
        'waktu_pembayaran',
        'status_transaksi',
        'checkin_oleh',
        'checkin_pada',
        'checkout_oleh',
        'checkout_pada',
        'catatan'
    ];
}
