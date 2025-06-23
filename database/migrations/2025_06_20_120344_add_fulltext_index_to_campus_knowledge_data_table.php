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
        Schema::table('campus_knowledge_data', function (Blueprint $table) {
            $table->index('source_type');
            $table->index('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campus_knowledge_data', function (Blueprint $table) {
            // Hapus indeks saat rollback
            $table->dropIndex(['source_type']);
            $table->dropIndex(['content']); 
        });
    }
};
