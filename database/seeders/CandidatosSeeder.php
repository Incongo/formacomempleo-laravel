<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Candidato;

class CandidatosSeeder extends Seeder
{
    public function run()
    {
        // Obtener los usuarios con rol candidato creados en UsersSeeder
        $usuariosCandidatos = User::where('role', 'candidato')->get();

        foreach ($usuariosCandidatos as $user) {

            Candidato::factory()->create([
                'user_id' => $user->id,
                'email' => $user->email, // coherencia entre tablas
                'name' => $user->name,   // coherencia entre tablas
            ]);
        }
    }
}
