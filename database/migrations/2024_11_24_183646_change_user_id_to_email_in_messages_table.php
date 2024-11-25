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
        Schema::table('messages', function (Blueprint $table) {
            // Mengganti user_id dengan email
            $table->dropForeign(['user_id']); // Hapus constraint foreign key
            $table->dropColumn('user_id');
            $table->string('email')->unique();  // Menambahkan email sebagai kolom unik
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            // Mengembalikan ke user_id jika migrasi dibatalkan
            $table->dropColumn('email');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
};