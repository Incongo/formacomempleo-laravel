<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('postulaciones', function (Blueprint $table) {
            $table->id();

            // Relación con candidatos
            $table->unsignedBigInteger('candidato_id');
            $table->foreign('candidato_id')
                ->references('id')
                ->on('candidatos')
                ->onDelete('cascade');

            // Relación con ofertas
            $table->unsignedBigInteger('oferta_id');
            $table->foreign('oferta_id')
                ->references('id')
                ->on('ofertas')
                ->onDelete('cascade');

            // Estado de la postulación
            $table->enum('estado', ['pendiente', 'aceptado', 'rechazado'])
                ->default('pendiente');

            // Información adicional
            $table->text('mensaje')->nullable(); // carta de presentación
            $table->string('cv_personalizado')->nullable(); // opcional

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('postulaciones');
    }
};
