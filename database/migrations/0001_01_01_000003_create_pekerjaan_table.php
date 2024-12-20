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

        if (Schema::hasTable('pekerjaan')) {
            Schema::table('pekerjaan', function (Blueprint $table) {
                $table->enum('STATUS', ['Selesai', 'Dalam Proses'])->default('Dalam Proses')->change();
            });
        }

        if (!Schema::hasTable('pekerjaan')) {
            Schema::create('pekerjaan', function (Blueprint $table) {
                $table->increments('ID_PEKERJAAN');
                $table->integer('ID_GRAFIK')->unsigned()->nullable();
                $table->integer('ID_PROYEK')->unsigned()->nullable();
                $table->string('NAMA', 255);
                $table->enum('STATUS', ['Selesai', 'Dalam Proses'])->default('Dalam Proses');
                $table->string('KATEGORI', 100);
                $table->date('TANGGAL');
                $table->date('date_end')->nullable(); // Tambahkan nullable untuk kolom ini
                $table->timestamps();

                // Define indexes
                $table->index('ID_PROYEK');
                $table->index('ID_GRAFIK');
            });

            // Foreign key constraints
            Schema::table('pekerjaan', function (Blueprint $table) {
                $table->foreign('ID_GRAFIK')->references('ID_GRAFIK')->on('standard')->onDelete('set null');
                $table->foreign('ID_PROYEK')->references('ID_PROYEK')->on('proyek')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::table('pekerjaan', function (Blueprint $table) {
        // Check if the foreign key exists before dropping it
        if (Schema::hasColumn('pekerjaan', 'ID_GRAFIK')) {
            $table->dropForeign(['ID_GRAFIK']);
        }
        if (Schema::hasColumn('pekerjaan', 'ID_PROYEK')) {
            $table->dropForeign(['ID_PROYEK']);
        }
    });

    Schema::dropIfExists('pekerjaan');
    }
};
