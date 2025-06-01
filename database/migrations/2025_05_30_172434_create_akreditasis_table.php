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
        Schema::create('akreditasi', function (Blueprint $table) {
            $table->id();
            $table->string('photo_sertifikat');
            $table->string('nama_prodi');
            $table->string('akreditasi');
            $table->string('sk_akreditasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->string('lembaga_akreditasi');
            $table->string('jenjang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akreditasi');
    }
};
