<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesananTable extends Migration 
{
    public function up()
    {
        Schema::create('detail_pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id')->constrained('pemesanan')->onDelete('cascade');
            $table->foreignId('menu_id')->constrained('menus'); // Pastikan tabel `menus` sudah ada
            $table->integer('quantity');
            $table->decimal('harga', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_pemesanan');
    }
};
