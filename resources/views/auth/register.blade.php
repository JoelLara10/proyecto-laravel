@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3>Registro</h3>
                <form method="POST" action="{{ route('register') }}">
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
    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'Errores en el registro',
                html: '<ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
@endsection
