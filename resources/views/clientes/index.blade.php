@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Lista de Clientes</h1>
    <a href="{{ url('clientes/crear') }}" class="btn btn-success mb-3">Crear Nuevo Cliente</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>
                    <a href="{{ url('clientes/'.$cliente->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ url('clientes/'.$cliente->id.'/editar') }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ url('clientes/'.$cliente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clientes->links('pagination::bootstrap-4') }}
</div>
@endsection
