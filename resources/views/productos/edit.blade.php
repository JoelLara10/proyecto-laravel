@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Editar Producto</h1>
    <form action="{{ url('productos/'.$producto->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" name="precio" class="form-control" step="0.01" value="{{ $producto->precio }}" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock:</label>
            <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
</div>
@endsection
