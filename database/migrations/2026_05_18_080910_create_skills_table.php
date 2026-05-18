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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('nama_skill'); // Contoh: Laravel, Python, JPOS & Printer Setup, Instalasi CCTV
            $table->string('kategori');   // Contoh: Programming, API Integration, IT Infrastructure
            $table->string('tingkat');    // Contoh: Expert, Advanced, Intermediate, Basic
            $table->string('ikon')->nullable(); // Class FontAwesome, contoh: 'fab fa-laravel', 'fas fa-print'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
