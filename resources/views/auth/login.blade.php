@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3>Iniciar sesión</h3>
                <form method="POST" action="{{ route('login') }}">
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

    @if (session('success'))
        <script>
            Swal.fire({
                title: '¡Registro exitoso!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'Errores en el inicio de sesión',
                html: '<ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
@endsection
