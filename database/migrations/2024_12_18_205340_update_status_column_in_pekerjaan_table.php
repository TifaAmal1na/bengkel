<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStatusColumnInPekerjaanTable extends Migration
{
    public function up()
{
    Schema::table('pekerjaan', function (Blueprint $table) {
        $table->enum('STATUS', ['Selesai', 'Dalam Proses'])->default('Dalam Proses')->after('TANGGAL_SELESAI');
    });
}

public function down()
{
    Schema::table('pekerjaan', function (Blueprint $table) {
        $table->dropColumn('STATUS');
    });
}
}

