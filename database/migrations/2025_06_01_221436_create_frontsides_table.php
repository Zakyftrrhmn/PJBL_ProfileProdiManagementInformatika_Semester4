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
        Schema::create('frontside', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title');
            $table->string('hero_subtitle');
            $table->string('hero_description');

            $table->string('intro_title');
            $table->string('intro_description');

            $table->string('visi_misi_title');
            $table->string('visi_misi_subtitle');
            $table->string('visi_misi_description');
            $table->string('visi_misi_video_url')->nullable();

            $table->string('why_join_title');
            $table->string('why_join_description');
            $table->string('why_join_video_url')->nullable();

            $table->string('karya_title');
            $table->string('karya_subtitle');
            $table->string('karya_description');

            $table->string('banner')->nullable();

            $table->string('dosen_title');
            $table->string('dosen_subtitle');
            $table->string('dosen_description');

            $table->string('information_title');
            $table->string('information_subtitle');
            $table->string('information_description');

            $table->string('penutup_title');
            $table->string('penutup_description');

            $table->string('kurikulum_title');
            $table->string('kurikulum_subtitle');
            $table->string('kurikulum_description');

            $table->string('akreditasi_title');
            $table->string('akreditasi_subtitle');
            $table->string('akreditasi_description');

            $table->string('kalender_title');
            $table->string('kalender_subtitle');

            $table->string('profile_title');
            $table->string('profile_subtitle');
            $table->string('profile_description');

            $table->string('laporan_title');
            $table->string('laporan_subtitle');
            $table->string('laporan_description');

            $table->string('galeri_title');
            $table->string('galeri_subtitle');
            $table->string('galeri_description');

            $table->string('prestasi_title');
            $table->string('prestasi_subtitle');
            $table->string('prestasi_description');

            $table->string('kontak_title');
            $table->string('kontak_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontside');
    }
};
