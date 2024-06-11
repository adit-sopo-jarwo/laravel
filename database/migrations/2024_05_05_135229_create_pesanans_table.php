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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->char('Nama_Pelanggan', 30);
            $table->string('Alamat', 30);
            $table->string('Telepon', 15);
            $table->string('Email', 30);
            $table->foreignId('ID_Buah')->constrained('buahs')->cascadeOnDelete();
            $table->string('Jumlah', 6);
            $table->string('Total', 12);
            $table->char('Status_Pesanan', 20)->default('Process');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
