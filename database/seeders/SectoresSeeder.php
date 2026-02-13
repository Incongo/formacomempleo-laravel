<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectoresSeeder extends Seeder
{
    public function run()
    {
        $sectores = [
            'Tecnología',
            'Construcción',
            'Educación',
            'Sanidad',
            'Hostelería',
            'Transporte',
            'Marketing',
            'Finanzas',
            'Industria',
            'Energía',
            'Retail',
            'Logística',
            'Turismo',
            'Automoción',
            'Agricultura',
            'Consultoría',
            'Telecomunicaciones',
            'Legal',
            'Recursos Humanos',
            'Diseño gráfico',
        ];

        foreach ($sectores as $sector) {
            DB::table('sectores')->insert([
                'nombre' => $sector,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
