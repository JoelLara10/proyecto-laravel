@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Editar Pedido #{{ $pedido->id }}</h1>
    <form action="{{ url('pedidos/'.$pedido->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente:</label>
            <input type="text" name="cliente" id="cliente" class="form-control" value="{{ $pedido->cliente }}" required>
        </div>
        <div class="mb-3">
            <label for="producto" class="form-label">Producto:</label>
            <input type="text" name="producto" id="producto" class="form-control" value="{{ $pedido->producto }}" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total:</label>
            <input type="number" name="total" id="total" class="form-control" step="0.01" value="{{ $pedido->total }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
</div>
@endsection
