<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('empresas', function (Blueprint $table) {

            // Campos que faltan según tu controlador
            $table->string('persona_contacto', 150)->nullable()->after('web');
            $table->string('email_contacto', 150)->nullable()->after('persona_contacto');

            $table->string('direccion', 200)->nullable()->after('email_contacto');
            $table->string('cp', 10)->nullable()->after('direccion');
            $table->string('ciudad', 100)->nullable()->after('cp');
            $table->string('provincia', 100)->nullable()->after('ciudad');

            $table->string('logo')->nullable()->after('provincia');
            $table->boolean('verificada')->default(false)->after('logo');
        });
    }

    public function down(): void
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropColumn([
                'persona_contacto',
                'email_contacto',
                'direccion',
                'cp',
                'ciudad',
                'provincia',
                'logo',
                'verificada',
            ]);
        });
    }
};
