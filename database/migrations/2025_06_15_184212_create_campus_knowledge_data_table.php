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
        Schema::create('campus_knowledge_data', function (Blueprint $table) {
            $table->id();
            $table->longText('content'); // Kolom ini akan menyimpan teks lengkap dari informasi kampus
            $table->string('source_type')->nullable(); // Opsional: untuk menandai jenis data (misal: 'kurikulum', 'dosen')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campus_knowledge_data');
    }
};
