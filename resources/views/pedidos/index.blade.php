@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Pedidos</h1>
    <a href="{{ url('pedidos/crear') }}" class="btn btn-success mb-3">Crear Pedido</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
            <tr id="pedido-{{ $pedido->id }}">
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->cliente }}</td>
                <td>{{ $pedido->producto }}</td>
                <td>${{ number_format($pedido->total, 2) }}</td>
                <td>
                    <a href="{{ url('pedidos/'.$pedido->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ url('pedidos/'.$pedido->id.'/editar') }}" class="btn btn-warning btn-sm">Editar</a>
                    <button class="btn btn-danger btn-sm" onclick="eliminarPedido({{ $pedido->id }})">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pedidos->links('pagination::bootstrap-4') }}
</div>

<!-- Asegúrate de incluir jQuery y SweetAlert -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function eliminarPedido(id) {
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
              // Realizar la solicitud AJAX para eliminar el pedido
              $.ajax({
                  type: 'POST',
                  url: '/pedidos/' + id,
                  data: {
                      _token: "{{ csrf_token() }}",
                      _method: 'DELETE'  // Indicar que el método es DELETE
                  },
                  success: function(response) {
                      Swal.fire(
                          '¡Eliminado!',
                          'El pedido ha sido eliminado.',
                          'success'
                      );
                      // Eliminar la fila del pedido de la tabla
                      $('#pedido-' + id).remove();
                  },
                  error: function(error) {
                      Swal.fire(
                          'Error',
                          'Hubo un problema al eliminar el pedido.',
                          'error'
                      );
                  }
              });
          }
      });
  }
</script>

@endsection
