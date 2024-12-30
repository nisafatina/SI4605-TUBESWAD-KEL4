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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');  // Nama customer
            $table->string('email')->nullable();  // Email customer
            $table->string('restaurant_name');  // Nama restoran yang dituju
            $table->text('feedback');  // Feedback dari customer
            $table->timestamps();  // Menyimpan waktu ketika feedback dibuat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};