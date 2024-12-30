<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->string('nama_menu'); // Menambahkan kolom nama_menu
        });
    }
    
    public function down()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropColumn('nama_menu'); // Menghapus kolom nama_menu jika rollback
        });
    }
    
};
