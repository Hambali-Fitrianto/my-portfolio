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
        Schema::create('project_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id'); // Murni integer untuk relasi di Model nanti
            $table->string('role_akses');             // Contoh: Admin, User, Mekanik
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_accounts');
    }
};
