@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Editar Cliente</h1>

    <form action="{{ url('clientes/'.$cliente->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" value="{{ $cliente->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="text" name="telefono" value="{{ $cliente->telefono }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
