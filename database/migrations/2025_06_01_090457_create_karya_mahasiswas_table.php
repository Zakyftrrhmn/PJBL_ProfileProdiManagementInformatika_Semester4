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
        Schema::create('karya_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail');
            $table->longText('judul');
            $table->string('isi');
            $table->integer('tahun');
            $table->foreignId('kategori_id')->constrained('kategori_karya')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karya_mahasiswa');
    }
};
