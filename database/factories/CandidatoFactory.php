<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatoFactory extends Factory
{
    public function definition()
    {
        return [
            'telefono' => $this->faker->numerify('6########'),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '2004-01-01'),
            'dni' => strtoupper($this->faker->bothify('########?')),
            'name' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName() . ' ' . $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'linkedin' => 'https://linkedin.com/in/' . $this->faker->userName(),
            'web' => $this->faker->url(),
            'direccion' => $this->faker->streetAddress(),
            'cp' => $this->faker->postcode(),
            'ciudad' => $this->faker->city(),
            'provincia' => $this->faker->state(),
            'cv' => 'cvs/default.pdf',
            'foto' => 'fotos/default.jpg',
        ];
    }
}
