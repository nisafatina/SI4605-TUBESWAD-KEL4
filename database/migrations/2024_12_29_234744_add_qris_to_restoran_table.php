<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('restoran', function (Blueprint $table) {
            $table->string('qris')->nullable(); // Gambar QRIS, nullable karena mungkin belum ada gambar QRIS di beberapa restoran
        });
    }

    public function down()
    {
        Schema::table('restoran', function (Blueprint $table) {
            $table->dropColumn('qris');
        });
    }
};
