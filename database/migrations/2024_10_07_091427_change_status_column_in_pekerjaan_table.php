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
        Schema::table('pekerjaan', function (Blueprint $table) {
            // Ubah kolom STATUS menjadi ENUM
            $table->enum('STATUS', ['Selesai', 'Dalam Proses', 'Aktif', 'Menunggu'])->default('Aktif')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pekerjaan', function (Blueprint $table) {
            // Kembalikan kolom STATUS ke tipe sebelumnya (jika perlu)
            $table->string('STATUS')->default('Aktif')->change(); // Ganti dengan tipe sebelumnya
        });
    }
};
