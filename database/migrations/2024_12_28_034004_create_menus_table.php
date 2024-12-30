<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemilik'); // Tambahkan kolom restoran_id
            $table->string('nama_menu');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 10, 2);
            $table->string('kategori')->nullable();
            $table->string('gambar_menu')->nullable();
            $table->timestamps();

            // Foreign key ke tabel restorans
            $table->foreign('id_pemilik')->references('id')->on('restoran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
