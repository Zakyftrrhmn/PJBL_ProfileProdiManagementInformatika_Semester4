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
            // Mengubah $table->id(); menjadi $table->uuid('id')->primary();
            $table->uuid('id')->primary(); // Menggunakan UUID sebagai primary key
            $table->string('thumbnail');
            $table->longText('judul');
            $table->string('slug')->unique();
            $table->string('isi');
            $table->integer('tahun');

            // Ubah foreignId menjadi uuid untuk kategori_id
            $table->uuid('kategori_id'); // Kolom kategori_id sekarang bertipe UUID
            $table->foreign('kategori_id')->references('id')->on('kategori_karya')->onDelete('cascade');

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
