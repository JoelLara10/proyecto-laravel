<!-- resources/views/admin/usuarios/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('admin.usuarios.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Importante: Usar @method('PUT') para indicar que es una actualización -->

        <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rol:</label>
            <select name="role" class="form-control" required>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>Invitado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </form>
</div>
@endsection
