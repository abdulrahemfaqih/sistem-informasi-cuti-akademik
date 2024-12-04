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
        Schema::create('pengajuan_bss', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('mahasiswa_id');
            $table->ulid('tahun_ajaran_id');
            $table->ulid('semester_id');
            $table->text('alasan');
            $table->text('catatan')->nullable()->default(null);
            $table->date('diajukan_pada');
            $table->date('disetujui_pada')->nullable()->default(null);
            $table->date('ditolak_pada')->nullable()->default(null);
            $table->text('alasan_penolakan')->nullable()->default(null);
            $table->enum('status', ['belum lengkap', 'diajukan', 'disetujui', 'ditolak'])->default('belum lengkap');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajaran');
            $table->foreign('semester_id')->references('id')->on('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_bsses');
    }
};
