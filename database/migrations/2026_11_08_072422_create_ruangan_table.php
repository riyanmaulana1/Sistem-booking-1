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
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruangan');
            $table->string('nama_lain')->nullable();
            $table->string('kode_ruangan');
            $table->string('kategori_ruangan');
            $table->string('jenis_ruangan');
            $table->string('gedung')->nullable();
            $table->string('lantai')->nullable();
            $table->unsignedInteger('kapasitas');
            $table->text('fasilitas')->nullable();
            $table->string('status_ruangan')->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan');
    }
};
