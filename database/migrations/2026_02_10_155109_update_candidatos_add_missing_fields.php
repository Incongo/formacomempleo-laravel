<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('candidatos', function (Blueprint $table) {

            // YA EXISTEN: dni, name, apellidos, telefono, fecha_nacimiento, cv

            // Faltan:
            $table->string('email', 150)->nullable()->after('apellidos');
            $table->string('linkedin', 200)->nullable()->after('email');
            $table->string('web', 200)->nullable()->after('linkedin');

            $table->string('direccion', 200)->nullable()->after('web');
            $table->string('cp', 10)->nullable()->after('direccion');
            $table->string('ciudad', 100)->nullable()->after('cp');
            $table->string('provincia', 100)->nullable()->after('ciudad');

            $table->string('password_hash', 255)->nullable()->after('fecha_nacimiento');
        });
    }

    public function down(): void
    {
        Schema::table('candidatos', function (Blueprint $table) {
            $table->dropColumn([
                'email',
                'linkedin',
                'web',
                'direccion',
                'cp',
                'ciudad',
                'provincia',
                'password_hash',
            ]);
        });
    }
};
