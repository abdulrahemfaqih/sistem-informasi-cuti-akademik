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
        Schema::create('surat_keterangan_cuti', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nomor_surat');
            $table->ulid('pengajuan_bss_id');
            $table->ulid('mahasiswa_id');
            $table->ulid('tahun_ajaran_masuk_id');
            $table->ulid('semester_masuk_id');
            $table->string('path_file');
            $table->string('nama_file');
            $table->date('tanggal_terbit');
            $table->timestamps();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('pengajuan_bss_id')->references('id')->on('pengajuan_bss');
            $table->foreign('tahun_ajaran_masuk_id')->references('id')->on('tahun_ajaran');
            $table->foreign('semester_masuk_id')->references('id')->on('semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_cutis');
    }
};
