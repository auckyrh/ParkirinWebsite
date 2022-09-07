<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'lokasi';
    public $timestamps = true;
    protected $fillable = [
        'id_pemilik',
        'nama',
        'alamat',
        'foto_path',
        'kapasitasmax_mobil',
        'kapasitasmax_motor',
        'longitude',
        'latitude',
        'biaya_mobil',
        'biaya_motor'
    ];
}
