<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // -----------------------------
        // ADMIN
        // -----------------------------
        User::factory()->admin()->create([
            'name' => 'Administrador',
            'email' => 'admin@formacom.com',
        ]);

        // -----------------------------
        // EMPRESAS (10 usuarios)
        // -----------------------------
        User::factory()
            ->count(10)
            ->empresa()
            ->create();

        // -----------------------------
        // CANDIDATOS (20 usuarios)
        // -----------------------------
        User::factory()
            ->count(20)
            ->create(); // por defecto role = candidato
    }
}
