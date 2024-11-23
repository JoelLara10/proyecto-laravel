@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Detalles del Cliente</h1>

    <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
    <p><strong>Email:</strong> {{ $cliente->email }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>

    <a href="{{ url('clientes') }}" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection
