@extends('layouts.app')

@section('title', 'Crear Nuevo Usuario')

@section('content')
<div class="container">
    <h1 class="mt-4">Crear Nuevo Usuario</h1>

    <form id="user_form" action="{{ route('admin.usuarios.store') }}" method="POST" class="mt-3">
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#user_form').on('submit', function(event){
                event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

                var data = $(this).serialize(); // Obtener los datos del formulario
                var url = $(this).attr('action'); // Obtener la URL del formulario

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(response) {
                        alert('¡Usuario creado con exitoso!');
                        console.log(response); 
                        window.location.href = '/admin';
                    },
                    error: function(error){
                        alert('Error al enviar el formulario');
                        console.log(error); 
                    }
                });
            });
        });
    </script>
@endsection
