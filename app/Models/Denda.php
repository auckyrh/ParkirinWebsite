<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'denda';
    public $timestamps = true;
    protected $fillable = [
        'id_transaksi',
        'id_user',
        'jam_overtime',
        'jumlah_denda',
        'status',
    ];
}
