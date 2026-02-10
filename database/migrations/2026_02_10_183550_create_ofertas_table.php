<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();

            // Relación con empresas
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onDelete('cascade');

            // Datos de la oferta
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('salario')->nullable();
            $table->string('tipo_contrato')->nullable(); // indefinido, temporal, prácticas...
            $table->string('modalidad')->nullable(); // presencial, remoto, híbrido
            $table->string('ubicacion')->nullable();

            // Estado de la oferta
            $table->enum('estado', ['activa', 'pausada', 'cerrada'])
                ->default('activa');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ofertas');
    }
};
