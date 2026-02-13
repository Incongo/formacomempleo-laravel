<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => $this->faker->company(),
            'cif' => strtoupper($this->faker->bothify('B########')),
            'telefono' => $this->faker->numerify('6########'),
            'web' => $this->faker->url(),
            'persona_contacto' => $this->faker->name(),
            'email_contacto' => $this->faker->companyEmail(),
            'direccion' => $this->faker->streetAddress(),
            'cp' => $this->faker->postcode(),
            'ciudad' => $this->faker->city(),
            'provincia' => $this->faker->state(),
            'logo' => 'logos/default.png',
            'verificada' => $this->faker->boolean(70),
            'descripcion' => $this->faker->paragraph(3),
        ];
    }
}
