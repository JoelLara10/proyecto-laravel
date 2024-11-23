@extends('layouts.app')

@section('title', 'Tienda para Mascotas')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Gestion de Tienda</h1>
        <p class="text-center"> Bienvenido a la plataforma de gestion de productos y pedidos</p>

        <div class="row mt-4">
            <div class="col md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">Administrar los productos disponibles en la tienda.</p>
                        <a href="{{ route('productos.index')}}" class="btn btn-primary">Ver Productos</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Clientes</h5>
                        <p class="card-text">Gestionar la informacion de los clientes.</p>
                        <a href="{{ route('clientes.index')}}" class="btn btn-primary">Ver Clientes</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pedidos</h5>
                        <p class="card-text">Administra los pedidos realizados.</p>
                        <a href="{{ route('pedidos.index')}}" class="btn btn-primary">Ver Pedidos</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Administra los usuarios registrados.</p>
                        <a href="{{ route('admin.usuarios.index')}}" class="btn btn-primary">Ver Usuarios</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón de Cerrar Sesión -->
        <div class="mt-4 text-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
            </form>
        </div>
    </div>
@endsection
