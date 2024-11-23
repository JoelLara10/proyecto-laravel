@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Lista de Clientes</h1>

    @if(auth()->user()->role == 'admin')
        <a href="{{ url('clientes/crear') }}" class="btn btn-success mb-3">Crear Nuevo Cliente</a>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                @if(auth()->user()->role == 'admin')
                    <th>Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr id="cliente-{{ $cliente->id }}">
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->telefono }}</td>
                @if(auth()->user()->role == 'admin')
                    <td>
                        <a href="{{ url('clientes/'.$cliente->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ url('clientes/'.$cliente->id.'/editar') }}" class="btn btn-warning btn-sm">Editar</a>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCliente({{ $cliente->id }})">Eliminar</button>
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clientes->links('pagination::bootstrap-4') }}
</div>

<!-- Asegúrate de incluir jQuery y SweetAlert -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function eliminarCliente(id) {
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
              // Realizar la solicitud AJAX para eliminar el cliente
              $.ajax({
                  type: 'POST',
                  url: '/clientes/' + id,
                  data: {
                      _token: "{{ csrf_token() }}",
                      _method: 'DELETE'  // Indicar que el método es DELETE
                  },
                  success: function(response) {
                      Swal.fire(
                          '¡Eliminado!',
                          'El cliente ha sido eliminado.',
                          'success'
                      );
                      // Eliminar la fila del cliente de la tabla
                      $('#cliente-' + id).remove();
                  },
                  error: function(error) {
                      Swal.fire(
                          'Error',
                          'Hubo un problema al eliminar el cliente.',
                          'error'
                      );
                  }
              });
          }
      });
  }
</script>

@endsection
