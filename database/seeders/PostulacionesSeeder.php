<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidato;
use App\Models\Oferta;
use App\Models\Postulacion;

class PostulacionesSeeder extends Seeder
{
    public function run()
    {
        $candidatos = Candidato::all();
        $ofertas = Oferta::all();

        // Si no hay candidatos u ofertas, no seguimos
        if ($candidatos->count() === 0 || $ofertas->count() === 0) {
            return;
        }

        // Crear 50 postulaciones
        foreach (range(1, 50) as $i) {

            $candidato = $candidatos->random();
            $oferta = $ofertas->random();

            // Evitar duplicados candidato + oferta
            if (Postulacion::where('candidato_id', $candidato->id)
                ->where('oferta_id', $oferta->id)
                ->exists()
            ) {
                continue;
            }

            Postulacion::factory()->create([
                'candidato_id' => $candidato->id,
                'oferta_id' => $oferta->id,
            ]);
        }
    }
}
