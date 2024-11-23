@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Crear Producto</h1>
    <form id="user_form" action="{{ url('productos') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" name="precio" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock:</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
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
                        alert('¡Registro del nuevo producto exitoso!');
                        console.log(response); 
                        window.location.href = '/productos';
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
