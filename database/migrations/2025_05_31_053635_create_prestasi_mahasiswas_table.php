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
        Schema::create('prestasi_mahasiswas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->string('nama_lomba');
            $table->string('tingkat');
            $table->string('penyelenggara');
            $table->date('tanggal_lomba');
            $table->string('peringkat');
            $table->string('file_sertifikat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi_mahasiswas');
    }
};
