<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('no_meja');
            $table->decimal('total_harga', 15, 2);
            $table->string('bukti_pembayaran');
            $table->enum('status', ['pending', 'selesai'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};
