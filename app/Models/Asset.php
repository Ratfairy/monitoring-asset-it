<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
     protected $fillable = [
        'kode_asset',
        'nama_perangkat',
        'jenis_perangkat',
        'versi_perangkat',
        'pengguna',
        'departemen',
        'tanggal_beli',
        'harga',
        'foto',
        'status'
    ];
}
