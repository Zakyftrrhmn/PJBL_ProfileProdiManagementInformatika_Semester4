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
        Schema::create('informasi', function (Blueprint $table) {
            // Mengubah $table->id(); menjadi $table->uuid('id')->primary();
            $table->uuid('id')->primary(); // Menggunakan UUID sebagai primary key
            $table->string('thumbnail');
            $table->string('judul');
            $table->longText('isi');
            $table->string('slug')->unique();

            // Ubah foreignId menjadi foreignUuid untuk kategori_id dan user_id
            $table->uuid('kategori_id'); // Kolom kategori_id sekarang bertipe UUID
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');

            $table->uuid('user_id'); // Kolom user_id sekarang bertipe UUID
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes(); // BARIS INI DITAMBAHKAN UNTUK KOLOM `deleted_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi');
    }
};
