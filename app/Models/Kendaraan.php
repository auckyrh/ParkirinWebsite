<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'kendaraan';
    public $timestamps = true;
    protected $fillable = [
        'plat_nomor',
        'id_user',
        'jenis_kendaraan',
        'merk_model',
    ];

}
