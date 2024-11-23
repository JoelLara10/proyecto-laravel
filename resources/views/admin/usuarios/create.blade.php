@extends('layouts.app')

@section('title', 'Crear Nuevo Usuario')

@section('content')
<div class="container">
    <h1 class="mt-4">Crear Nuevo Usuario</h1>

    <form action="{{ route('admin.usuarios.store') }}" method="POST" class="mt-3">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rol:</label>
            <select name="role" id="role" class="form-control" required>
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
                <option value="guest">Invitado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
</div>
@endsection
