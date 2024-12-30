<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    protected $table = 'restoran';

    protected $fillable = [
        'id_pemilik',
        'nama_restoran',
        'gambar',
        'qris',
    ];
}
