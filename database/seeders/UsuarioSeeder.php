<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Usuario;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea 10 usuarios de ejemplo
        for ($i = 0; $i < 10; $i++) {
            Usuario::create([
                'username' => 'user' . $i . Str::random(3),
                'password' => Hash::make('password' . $i), // Puedes usar un valor seguro y aleatorio para producción
            ]);
        }
    }
}
