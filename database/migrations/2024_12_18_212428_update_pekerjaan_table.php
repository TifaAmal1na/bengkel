<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePekerjaanTable extends Migration
{
    public function up()
    {
        Schema::table('pekerjaan', function (Blueprint $table) {
            // Only drop column if it exists
            if (Schema::hasColumn('pekerjaan', 'STATUS')) {
                $table->dropColumn('STATUS');
            }
        });
    }

    public function down()
    {
        Schema::table('pekerjaan', function (Blueprint $table) {
            // Add the STATUS column back if necessary
            $table->enum('STATUS', ['Dalam Proses', 'Selesai'])->default('Dalam Proses');
        });
    }

}

