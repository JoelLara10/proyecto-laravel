@extends('layouts.app')

@section('content')
    <h1>Lista de Usuarios</h1>
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
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                @if(auth()->user()->role == 'admin')
                    <td>
                        <a href="{{ route('admin.usuarios.edit', $user) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.usuarios.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links('pagination::bootstrap-4') }}
@endsection
