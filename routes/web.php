<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\administrador;

// Redirige al login si el usuario no está autenticado
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas que requieren autenticación
Route::middleware(['auth'])->group(function () {

    // Ruta principal
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas de productos
    Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('productos/crear', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
    Route::get('productos/{id}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

    // Rutas de clientes
    Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('clientes/crear', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::get('clientes/{id}/editar', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    // Rutas de pedidos
    Route::get('pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('pedidos/crear', [PedidoController::class, 'create'])->name('pedidos.create');
    Route::post('pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
    Route::get('pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show');
    Route::get('pedidos/{id}/editar', [PedidoController::class, 'edit'])->name('pedidos.edit');
    Route::put('pedidos/{id}', [PedidoController::class, 'update'])->name('pedidos.update');
    Route::delete('pedidos/{id}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');
});

// Rutas de administración que requieren middleware de administrador
Route::middleware(['auth', administrador::class])->group(function () {
    // Rutas de usuarios
    Route::get('admin', [UserController::class, 'index'])->name('admin.usuarios.index');
    Route::get('admin/crear', [UserController::class, 'create'])->name('admin.usuarios.create');
    Route::post('admin', [UserController::class, 'store'])->name('admin.usuarios.store');
    Route::get('admin/{user}', [UserController::class, 'show'])->name('admin.usuarios.show'); 
    Route::get('admin/{user}/editar', [UserController::class, 'edit'])->name('admin.usuarios.edit'); 
    Route::put('admin/{user}', [UserController::class, 'update'])->name('admin.usuarios.update');
    Route::delete('admin/{user}', [UserController::class, 'destroy'])->name('admin.usuarios.destroy'); 
});
