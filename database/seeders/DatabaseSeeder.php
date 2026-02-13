<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SectoresSeeder::class,
            UsersSeeder::class,
            EmpresasSeeder::class,
            CandidatosSeeder::class,
            OfertasSeeder::class,
            PostulacionesSeeder::class,
        ]);
    }
}
