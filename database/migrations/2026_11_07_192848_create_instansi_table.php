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
        Schema::create('instansi', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_instansi');
            $table->string('nama_instansi');
            $table->foreignId('fakultas_id')->nullable()->constrained('fakultas')->restrictOnDelete();
            $table->foreignId('prodi_id')->nullable()->constrained('prodi')->restrictOnDelete();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_telepon')->nullable();
            $table->string('status_akun')->default('aktif');
            $table->boolean('wajib_ganti_password')->default('true');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansi');
    }
};
