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
        Schema::create('users', function (Blueprint $table) {
            // Mengubah $table->id(); menjadi $table->uuid('id')->primary();
            $table->uuid('id')->primary(); // Menggunakan UUID sebagai primary key
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Tabel password_reset_tokens dan sessions tidak perlu diubah ke UUID untuk primary key-nya
        // karena mereka umumnya menggunakan string atau foreign key ke user_id.
        // Namun, foreignId('user_id') perlu diubah jika user_id di sessions juga diubah menjadi UUID.
        // Karena user_id di sessions adalah foreign key ke users.id, maka ini perlu disesuaikan.
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            // Ubah foreignId('user_id') menjadi uuidForeignId('user_id')
            $table->uuid('user_id')->nullable()->index(); // Menggunakan UUID sebagai foreign key
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();

            // Tambahkan foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Pastikan untuk menghapus foreign key constraint terlebih dahulu
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id'); // Drop kolom setelah drop foreign key
        });

        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
