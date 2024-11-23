<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cliente' => $this->faker->name, // Nombre falso para el cliente
            'producto' => $this->faker->word, // Nombre falso de un producto
            'total' => $this->faker->randomFloat(2, 10, 500), // Total entre 10 y 500
        ];
    }
}
