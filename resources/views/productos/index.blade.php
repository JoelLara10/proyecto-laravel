@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Lista de Productos</h1>
    <a href="{{ url('productos/crear') }}" class="btn btn-success mb-3">Crear Nuevo Producto</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->stock }}</td>
                <td>
                    <a href="{{ url('productos/'.$producto->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ url('productos/'.$producto->id.'/editar') }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ url('productos/'.$producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $productos->links('pagination::bootstrap-4') }}
</div>
@endsection
