<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Libro;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->name,
            'autor' => $this->faker->name,
            'editorial' => $this-> faker->name,
            'anio' => $this->faker->numerify('####'),
            'cantidad_disponible' => $this->faker->numerify('###'),
        ];
    }
}
