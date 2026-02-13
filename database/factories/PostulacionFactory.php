<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostulacionFactory extends Factory
{
    public function definition()
    {
        return [
            'estado' => $this->faker->randomElement(['pendiente', 'aceptado', 'rechazado']),
            'mensaje' => $this->faker->boolean(50) ? $this->faker->sentence(10) : null,
            'cv_personalizado' => null,
        ];
    }
}
