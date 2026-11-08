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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->restrictOnDelete();
            $table->foreignId('ruangan_id')->constrained('ruangan')->restrictOnDelete();
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('perihal');
            $table->string('lampiran');
            $table->string('file_surat');
            $table->string('nama_kegiatan');
            $table->string('jenis_peminjaman');
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->unsignedInteger('jumlah_peserta_min');
            $table->unsignedInteger('jumlah_peserta_maks');
            $table->string('nama_pembina');
            $table->string('nip_pembina');
            $table->boolean('acara_universitas')->default(false);
            $table->string('nama_penanggung_jawab');
            $table->string('nim_penanggung_jawab')->nullable();
            $table->string('nip_penanggung_jawab')->nullable();
            $table->string('nama_ketua_organisasi')->nullable();
            $table->string('nim_ketua_organisasi')->nullable();
            $table->string('status')->default("menunggu");
            $table->unsignedTinyInteger('tahap_saat_ini')->nullable();
            $table->boolean("ditolak_otomatis")->default(false);
            $table->text('alasan_penolakan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
