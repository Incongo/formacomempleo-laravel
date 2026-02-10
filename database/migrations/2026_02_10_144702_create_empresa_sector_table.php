<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empresa_sector', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade');
            $table->foreignId('sector_id')->constrained('sectores')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresa_sector');
    }
};
