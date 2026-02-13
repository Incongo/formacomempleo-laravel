<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role' => 'candidato',
        ];
    }

    public function empresa()
    {
        return $this->state(fn() => [
            'role' => 'empresa',
        ]);
    }

    public function admin()
    {
        return $this->state(fn() => [
            'role' => 'admin',
        ]);
    }
}
