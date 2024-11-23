@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Pedido #{{ $pedido->id }}</h1>
    <p>Cliente: {{ $pedido->cliente}}</p>
    <p>Producto: {{ $pedido->producto}}</p>
    <p>Total: ${{ number_format($pedido->total, 2) }}</p>
    <a href="{{ url('pedidos') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection
