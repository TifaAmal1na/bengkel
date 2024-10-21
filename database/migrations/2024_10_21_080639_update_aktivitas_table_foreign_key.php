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
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
     {
        Schema::table('aktivitas', function (Blueprint $table) {
            // Drop the new foreign key if rolling back
            $table->dropForeign(['ID_PEKERJAAN']);
            // Re-add the old foreign key constraint without cascade
            $table->foreign('ID_PEKERJAAN')->references('ID_PEKERJAAN')->on('pekerjaan');
        });
    }
};
