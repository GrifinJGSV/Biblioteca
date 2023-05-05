<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'fecha_solicitud' =>$this->faker->dateTimeBetween('-1 days','+1 days'),
        'fecha_prestamo' =>$this->faker->dateTimeBetween('+1 days','+2 days'),
        'fecha_devolucion' =>$this ->faker->dateTimeBetween('+3 days','+2 weeks'),
        'libro_id'=>$this ->faker->numberBetween(1,20),
        'usuario_id'=>$this ->faker->numberBetween(1,20),

        ];
    }
}
