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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nim')->unique();
            $table->string('angkatan');
            $table->date('tanggal_masuk');
            $table->enum('status', ['aktif', 'tidak aktif', 'lulus']);
            $table->string('alamat');
            $table->ulid('program_studi_id');
            $table->ulid('user_id');
            $table->foreign('program_studi_id')->references('id')->on('program_studi');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
