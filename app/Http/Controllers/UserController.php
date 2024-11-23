<?php

// app/Http/Controllers/UserController.php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Muestra la lista de usuarios
    public function index()
    {
        // Usamos paginate para obtener los usuarios de forma paginada
        $users = User::paginate(10); // Paginación de 10 usuarios por página

        return view('admin.usuarios.index', compact('users'));
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create()
    {
        return view('admin.usuarios.create');
    }

    // Almacena un nuevo usuario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
        ]);

        User::create($validated);

        // Flash message para SweetAlert
        session()->flash('success', 'Usuario creado exitosamente.');

        return redirect()->route('admin.usuarios.index');
    }

    // Muestra un usuario específico
    public function show(User $user)
    {
        return view('admin.usuarios.show', compact('user'));
    }

    // Muestra el formulario para editar un usuario
    public function edit(User $user)
    {
        return view('admin.usuarios.edit', compact('user'));
    }

    // Actualiza los datos de un usuario
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string',
        ]);

        $user->update($validated);

        // Flash message para SweetAlert
        session()->flash('success', 'Usuario actualizado exitosamente.');

        return redirect()->route('admin.usuarios.index');
    }


    // Elimina un usuario
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'Usuario eliminado con éxito']);
        }

        return response()->json(['message' => 'Usuario no encontrado'], 404);
    }
}
