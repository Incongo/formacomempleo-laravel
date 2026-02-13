<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfertaFactory extends Factory
{
    public function definition()
    {
        $titulos = [
            'Programador Junior',
            'Administrativo',
            'Comercial',
            'Enfermero',
            'Camarero',
            'Conductor',
            'Diseñador gráfico',
            'Técnico de mantenimiento',
            'Profesor',
            'Analista financiero',
        ];

        return [
            'titulo' => $this->faker->randomElement($titulos),
            'descripcion' => $this->faker->paragraph(4),
            'salario' => $this->faker->numberBetween(18000, 45000) . ' €/año',
            'tipo_contrato' => $this->faker->randomElement(['Indefinido', 'Temporal', 'Prácticas']),
            'modalidad' => $this->faker->randomElement(['Presencial', 'Híbrido', 'Remoto']),
            'ubicacion' => $this->faker->city(),
            'estado' => $this->faker->randomElement(['activa', 'pausada', 'cerrada']),
        ];
    }
}
