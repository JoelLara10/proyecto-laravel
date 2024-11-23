@extends('layouts.app')

@section('content')
    <h1>Lista de Usuarios</h1>

    @if(auth()->user()->role == 'admin')
        <a href="{{ route('admin.usuarios.create') }}" class="btn btn-success mb-3">Crear Nuevo Usuario</a>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Correo electrónico</th>
                <th>Rol</th>
                @if(auth()->user()->role == 'admin')
                    <th>Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr id="user-{{ $user->id }}">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                @if(auth()->user()->role == 'admin')
                    <td>
                        <a href="{{ route('admin.usuarios.edit', $user) }}" class="btn btn-warning btn-sm">Editar</a>
                        <button class="btn btn-danger btn-sm" onclick="eliminarUsuario({{ $user->id }})">Eliminar</button>
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links('pagination::bootstrap-4') }}
@endsection

<!-- Asegúrate de incluir jQuery y SweetAlert -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function eliminarUsuario(id) {
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
              // Realizar la solicitud AJAX para eliminar el usuario
              $.ajax({
                  type: 'POST',
                  url: '/admin/' + id,
                  data: {
                      _token: "{{ csrf_token() }}",
                      _method: 'DELETE'  // Indicar que el método es DELETE
                  },
                  success: function(response) {
                      Swal.fire(
                          '¡Eliminado!',
                          'El usuario ha sido eliminado.',
                          'success'
                      );
                      // Eliminar la fila del usuario de la tabla
                      $('#user-' + id).remove();
                  },
                  error: function(error) {
                      Swal.fire(
                          'Error',
                          'Hubo un problema al eliminar el usuario.',
                          'error'
                      );
                  }
              });
          }
      });
  }
</script>
