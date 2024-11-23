<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->save();

        // Flash message para SweetAlert
        session()->flash('success', 'Producto creado exitosamente.');

        return redirect('productos');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->save();

        // Flash message para SweetAlert
        session()->flash('success', 'Producto actualizado exitosamente.');

        return redirect('productos');
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            $producto->delete();
            return response()->json(['message' => 'Producto eliminado con éxito']);
        }

        return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    
}
