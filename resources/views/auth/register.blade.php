@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3>Registro</h3>
                <form method="POST" action="{{ route('register') }}" id="user_form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                    <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
                </form>
            </div>
        </div>
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
                        alert('¡Registro exitoso!');
                        console.log(response); 
                        window.location.href = '/login';
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
