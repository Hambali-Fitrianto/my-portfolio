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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('institusi');     // Contoh: Trunojoyo University Madura
            $table->string('alamat');        // Contoh: Bangkalan, East Java
            $table->string('gelar');         // Contoh: Bachelor of Informatics Engineering
            $table->string('periode');       // Contoh: Sep 2020 - Jan 2024
            $table->string('gpa')->nullable(); // Contoh: 3.71/4.00
            $table->string('tugas_akhir')->nullable(); // Kolom Opsional untuk Judul Skripsi
            $table->text('deskripsi')->nullable();     // Detail pencapaian/spesialisasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
