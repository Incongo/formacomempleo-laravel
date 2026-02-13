<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ofertas', function (Blueprint $table) {
            $table->foreignId('sector_id')
                ->nullable()
                ->constrained('sectores')
                ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('ofertas', function (Blueprint $table) {
            $table->dropForeign(['sector_id']);
            $table->dropColumn('sector_id');
        });
    }
};
