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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_peminjam');
            $table->string('nama');
            $table->string('nim')->nullable();
            $table->string('nip')->nullable();
            $table->string('nama_organisasi')->nullable();
            $table->foreignId('fakultas_id')->constrained('fakultas')->restrictOnDelete();
            $table->foreignId('prodi_id')->nullable()->constrained('prodi')->restrictOnDelete();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('no_hp');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
