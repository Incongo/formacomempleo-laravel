<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

class EmpresasSeeder extends Seeder
{
    public function run()
    {
        // Lista de empresas españolas reales
        $empresasData = [
            ['nombre' => 'Inditex', 'cif' => 'A15075062'],
            ['nombre' => 'Telefónica', 'cif' => 'A28015865'],
            ['nombre' => 'Abanca', 'cif' => 'A70302039'],
            ['nombre' => 'Gadisa', 'cif' => 'A15017805'],
            ['nombre' => 'Navantia', 'cif' => 'A84073083'],
            ['nombre' => 'Hijos de Rivera', 'cif' => 'A15002637'],
            ['nombre' => 'Grupo Calvo', 'cif' => 'A15002637'],
            ['nombre' => 'Pescanova', 'cif' => 'A36002631'],
            ['nombre' => 'NTT Data (Everis)', 'cif' => 'A80764662'],
            ['nombre' => 'Acciona', 'cif' => 'A08001851'],
        ];

        // Obtener los usuarios empresa creados en UsersSeeder
        $usuariosEmpresa = User::where('role', 'empresa')->get();

        foreach ($usuariosEmpresa as $index => $user) {

            // Datos base de la empresa
            $empresaBase = $empresasData[$index];

            // Crear empresa usando factory + datos reales
            $empresa = Empresa::factory()->create([
                'user_id' => $user->id,
                'nombre' => $empresaBase['nombre'],
                'cif' => $empresaBase['cif'],
            ]);

            // Asignar sectores aleatorios (1 a 3)
            $sectores = DB::table('sectores')->inRandomOrder()->limit(rand(1, 3))->pluck('id');

            foreach ($sectores as $sectorId) {
                DB::table('empresa_sector')->insert([
                    'empresa_id' => $empresa->id,
                    'sector_id' => $sectorId,
                ]);
            }
        }
    }
}
