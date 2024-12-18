<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,  // Nombre aleatorio
            'email' => $this->faker->unique()->safeEmail,  // Correo electrónico único
            'telefono' => $this->faker->phoneNumber,  // Teléfono aleatorio
        ];
    }
}
