<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,  // Nombre del usuario
            'email' => $this->faker->unique()->safeEmail,  // Correo electrónico único
            'email_verified_at' => now(),  // Fecha de verificación del email
            'password' => Hash::make('password'),  // Contraseña encriptada (puedes cambiar la contraseña predeterminada)
            'role' => $this->faker->randomElement(['user', 'admin']),  // Rol aleatorio (usuario o admin)
            'remember_token' => Str::random(10),  // Token de "remember me"
        ];
    }
}
