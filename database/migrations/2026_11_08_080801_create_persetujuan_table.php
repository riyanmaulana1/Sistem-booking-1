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
        Schema::create('persetujuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')->constrained('peminjaman')->cascadeOnDelete();
            $table->foreignId('instansi_id')->constrained('instansi')->restrictOnDelete();
            $table->unsignedTinyInteger('urutan');
            $table->string('keputusan')->nullable();
            $table->text('alasan')->nullable();
            $table->timestamp('diputuskan_pada')->nullable();
            $table->timestamp('diberitahu_pada')->nullable();
            $table->string('nama_pejabat')->nullable();
            $table->string('jabatan_pejabat')->nullable();
            $table->string('nip_pejabat')->nullable();
            $table->string('tempat_surat')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->string('file_surat_persetujuan')->nullable();
            $table->timestamps();
            $table->unique(['peminjaman_id','urutan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persetujuan');
    }
};
