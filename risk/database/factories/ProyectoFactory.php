<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $horas = $this->faker->numberBetween(1,30);
        return [
            "titulo" => $this->faker->unique()->sentence(),
            "horas_previstas" => $horas,
            "fecha_inicio" => $this->faker->date(),
        ];
    }
}
