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
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->cliente }}</td>
                <td>{{ $pedido->producto }}</td>
                <td>{{ $pedido->total }}</td>
                <td>
                    <a href="{{ url('pedidos/'.$pedido->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ url('pedidos/'.$pedido->id.'/editar') }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ url('pedidos/'.$pedido->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pedidos->links('pagination::bootstrap-4') }}
</div>
@endsection
