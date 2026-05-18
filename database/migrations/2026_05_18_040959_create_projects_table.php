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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nama_project');
            $table->string('tipe_project')->nullable(); // Contoh: Manufaktur, Otomasi
            $table->text('deskripsi');
            $table->text('fitur_kunci')->nullable();    // Poin-poin fitur andalan
            $table->string('tech_stack');               // Contoh: Laravel, React, Python
            $table->string('link_project')->nullable();  // URL Aplikasi / GitHub
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
