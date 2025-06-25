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
        Schema::create('dosen', function (Blueprint $table) {
            // Mengubah $table->id(); menjadi $table->uuid('id')->primary();
            $table->uuid('id')->primary(); // Menggunakan UUID sebagai primary key
            $table->string('photo');
            $table->string('username')->unique(); // Tetap unique
            $table->string('nama');
            $table->string('asal_kota');
            $table->string('nidn')->unique(); // Tetap unique
            $table->string('website')->nullable(); // Website bisa null
            $table->string('email')->unique()->nullable(); // Email unique tapi bisa null
            $table->string('pendidikan');
            $table->string('jabatan')->nullable(); // Jabatan bisa null
            $table->string('kompetensi')->nullable(); // Tambahkan kolom kompetensi, bisa null
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
