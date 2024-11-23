@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3>Iniciar sesión</h3>
                <form id="user_form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    <a href="{{ route('register') }}" class="btn btn-link">¿No tienes cuenta? Regístrate</a>
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
                      alert('¡Inicio de sesión exitoso!');
                      console.log(response);
                      window.location.href = '/home'; // Redirige a la página de inicio o a la ruta que desees
                  },
                  error: function(error){
                      alert('Error al iniciar sesión');
                      console.log(error);
                  }
              });
          });
      });
    </script>
@endsection
