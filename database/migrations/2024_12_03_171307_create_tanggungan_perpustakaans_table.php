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
        Schema::create('tanggungan_perpustakaan', function (Blueprint $table) {
            $table->ulid('id');
            $table->ulid('mahasiswa_id');
            $table->string('nama_tanggungan');
            $table->enum('status', ['lunas', 'belum lunas']);
            $table->timestamps();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggungan_perpustakaans');
    }
};
