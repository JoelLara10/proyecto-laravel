@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4">Lista de Productos</h1>

        @if (auth()->user()->role == 'admin')
            <a href="{{ url('productos/crear') }}" class="btn btn-success mb-3">Crear Nuevo Producto</a>
        @endif

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    @if (auth()->user()->role == 'admin')
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr id="producto-{{ $producto->id }}">
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>${{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->stock }}</td>
                        @if (auth()->user()->role == 'admin')
                            <td>
                                <a href="{{ url('productos/' . $producto->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ url('productos/' . $producto->id . '/editar') }}"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <button class="btn btn-danger btn-sm"
                                    onclick="eliminarProducto({{ $producto->id }})">Eliminar</button>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $productos->links('pagination::bootstrap-4') }}
    </div>

    <!-- Asegúrate de incluir jQuery y SweetAlert -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function eliminarProducto(id) {
            // Confirmación antes de eliminar
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminarlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Realizar la solicitud AJAX para eliminar el producto
                    $.ajax({
                        type: 'POST',
                        url: '/productos/' + id,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: 'DELETE' // Indicar que el método es DELETE
                        },
                        success: function(response) {
                            Swal.fire(
                                '¡Eliminado!',
                                'El producto ha sido eliminado.',
                                'success'
                            );
                            // Eliminar la fila del producto de la tabla
                            $('#producto-' + id).remove();
                        },
                        error: function(error) {
                            Swal.fire(
                                'Error',
                                'Hubo un problema al eliminar el producto.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
@endsection
