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
        Schema::create('dokumen_pendukung', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('pengajuan_bss_id');
            $table->string('path_file');
            $table->string('nama_file');
            $table->enum('jenis_dokumen', ['kartu_mahasiswa', 'surat_bebas_tanggungan_fakultas', 'surat_bebas_perpustakaan', 'surat_permohonan_bss', 'surat_bebas_tanggungan_lab']);
            $table->boolean('terverifikasi')->default(false);
            $table->ulid('diverifikasi_oleh')->nullable();
            $table->date('disetujui_pada')->nullable();
            $table->timestamps();
            $table->foreign('pengajuan_bss_id')->references('id')->on('pengajuan_bss');
            $table->foreign('diverifikasi_oleh')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_pendukungs');
    }
};
