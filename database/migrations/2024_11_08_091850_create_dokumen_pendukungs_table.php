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
            $table->enum('jenis_dokumen', ['kartu_mahasiswa', 'surat_bebas_tanggungan_fakultas', 'surat_bebas_tanggungan_perpustakaan', 'surat_permohonan_bss', 'surat_bebas_tanggungan_lab']);
            $table->timestamps();
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
