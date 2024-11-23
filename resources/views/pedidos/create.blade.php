@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4">Crear Pedido</h1>
        <form id="user_form" action="{{ url('pedidos') }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente:</label>
                <input type="text" name="cliente" id="cliente" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="producto" class="form-label">Producto:</label>
                <input type="text" name="producto" id="producto" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Total:</label>
                <input type="number" name="total" id="total" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#user_form').on('submit', function(event) {
                event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

                var data = $(this).serialize(); // Obtener los datos del formulario
                var url = $(this).attr('action'); // Obtener la URL del formulario

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(response) {
                        alert('¡Pedido creado con exitoso!');
                        console.log(response);
                        window.location.href = '/pedidos';
                    },
                    error: function(error) {
                        alert('Error al enviar el formulario');
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
