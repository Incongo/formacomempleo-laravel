<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;
use App\Models\Oferta;

class OfertasSeeder extends Seeder
{
    public function run()
    {
        // Obtener todas las empresas creadas
        $empresas = Empresa::all();

        // Si no hay empresas, no seguimos
        if ($empresas->count() === 0) {
            return;
        }

        // Crear 30 ofertas repartidas entre las empresas
        foreach (range(1, 30) as $i) {

            $empresa = $empresas->random();

            Oferta::factory()->create([
                'empresa_id' => $empresa->id,
            ]);
        }
    }
}
