<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan'; // Nama tabel
    protected $fillable = [
        'nama_pemesan',
        'no_meja',
        'total_harga',
        'bukti_pembayaran',
        'status',
        'nama_menu',
    ];

    public function items()
    {
        return $this->hasMany(Item::class); // Atau relasi yang sesuai
    }
}