<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_menu',
        'deskripsi',
        'harga',
        'kategori',
        'gambar_menu',
        'id_pemilik',
    ];

    public function restoran()
    {
        return $this->belongsTo(Restoran::class, 'id_pemilik');
    }
}
