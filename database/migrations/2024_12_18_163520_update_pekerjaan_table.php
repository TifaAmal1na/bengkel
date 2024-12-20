<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Check if the 'status' column exists before adding it
        if (!Schema::hasColumn('pekerjaan', 'status')) {
            Schema::table('pekerjaan', function (Blueprint $table) {
                $table->enum('status', ['Selesai', 'Dalam Proses'])->default('Dalam Proses');
            });
        }

        // Check if the 'standard' column exists before adding it
        if (!Schema::hasColumn('pekerjaan', 'standard')) {
            Schema::table('pekerjaan', function (Blueprint $table) {
                $table->unsignedBigInteger('standard')->nullable();
            });
        }

        // Check if the 'tanggal_selesai' column exists before adding it
        if (!Schema::hasColumn('pekerjaan', 'tanggal_selesai')) {
            Schema::table('pekerjaan', function (Blueprint $table) {
                $table->date('tanggal_selesai')->nullable();
            });
        }

        // Check if the 'TANGGAL_MULAI' column exists before adding it
        if (!Schema::hasColumn('pekerjaan', 'TANGGAL_MULAI')) {
            Schema::table('pekerjaan', function (Blueprint $table) {
                $table->date('TANGGAL_MULAI')->nullable(); // Nullable or default value can be added here if needed
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('pekerjaan', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('standard');
            $table->dropColumn('tanggal_selesai');
            $table->dropColumn('TANGGAL_MULAI');
        });
    }
};
