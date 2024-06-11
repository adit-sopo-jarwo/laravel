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
        Schema::create('buahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Supplier')->constrained('suppliers')->cascadeOnDelete();
            $table->string('Nama_Buah', 30);
            $table->string('Harga_kg', 6);
            $table->string('Stok_Buah', 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buahs');
    }
};
