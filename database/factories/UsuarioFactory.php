<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=> $this ->faker->name,
            'correo' =>$this ->faker->email,
            'telefono'=>$this->faker->numerify('####-####'),
            'direccion' =>$this->faker->address,
        ];
    }
    
}