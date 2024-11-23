@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Pedido #{{ $pedido->id }}</h1>
    <p><strong>Cliente:</strong> {{ $pedido->cliente->nombre }}</p>
    <p><strong>Total:</strong> ${{ number_format($pedido->total, 2) }}</p>
    <a href="{{ url('pedidos') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection
