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
        Schema::create('histori_mahasiswa', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('mahasiswa_id');
            $table->ulid('tahun_ajaran_id');
            $table->ulid('semester_id');
            $table->ulid('surat_keterangan_cuti_id')->nullable();

            $table->enum('status', ['aktif', 'cuti', 'nonaktif']);
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajaran');
            $table->foreign('semester_id')->references('id')->on('semester');
            $table->foreign('surat_keterangan_cuti_id')->references('id')->on('surat_keterangan_cuti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_mahasiswas');
    }
};
