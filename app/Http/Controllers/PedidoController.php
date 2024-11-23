<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::paginate(10);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'producto' => 'required|string|max:255',
            'total' => 'required|numeric',
        ]);

        Pedido::create($request->all());

        session()->flash('success', 'Pedido creado exitosamente.');

        return redirect()->route('pedidos.index');
    }

    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'producto' => 'required|string|max:255',
            'total' => 'required|numeric',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        session()->flash('success', 'Pedido actualizado exitosamente.');
        return redirect()->route('pedidos.index');
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        if ($pedido) {
            $pedido->delete();
            return response()->json(['message' => 'Pedido eliminado con éxito']);
        }

        return response()->json(['message' => 'Pedido no encontrado'], 404);
    }
}
