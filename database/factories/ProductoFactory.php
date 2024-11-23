<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,  // Nombre del producto
            'descripcion' => $this->faker->sentence,  // Descripción del producto
            'precio' => $this->faker->randomFloat(2, 5, 1000),  // Precio entre 5 y 1000
            'stock' => $this->faker->numberBetween(1, 100),  // Stock entre 1 y 100
        ];
    }
}
