<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('perusahaan');
            $table->string('posisi');
            $table->string('periode');
            $table->text('deskripsi');

            // Kolom Fleksibel (Opsional)
            $table->string('link_website')->nullable();
            $table->text('akun_demo')->nullable(); // Bisa simpan info login yang panjang
            $table->text('foto_ss')->nullable();   // Kita simpan array nama file di sini

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
