<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'departamento' => $this->faker->name(),
            'municipio' => $this->faker->paragraph(),
            'genero' => $this->faker->paragraph(),
            'genero' => $this->faker->paragraph(),
            'tipo_documento' => $this->faker->paragraph(),
            'num_documento' => $this->faker->numberBetween(1-999),
            'nombre_1' => $this->faker->paragraph(),
            'nombre_2' => $this->faker->paragraph(),
            'apellido_1' => $this->faker->paragraph(),
            'apellido_2' => $this->faker->paragraph(),
            'stock' => $this->faker->numberBetween(1-999),

        ];
    }
}
