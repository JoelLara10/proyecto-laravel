@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Detalles del Producto</h1>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
    <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
    <a href="{{ url('productos') }}" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection
