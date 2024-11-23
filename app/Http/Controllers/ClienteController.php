<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('clientes.index', compact('clientes'));
    }


    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        // Flash message para SweetAlert
        session()->flash('success', 'Cliente creado exitosamente.');

        return redirect('clientes');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->nombre = $request->nombre;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        // Flash message para SweetAlert
        session()->flash('success', 'Cliente actualizado exitosamente.');

        return redirect('clientes');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->delete();
            return response()->json(['message' => 'Cliente eliminado con éxito']);
        }

        return response()->json(['message' => 'Cliente no encontrado'], 404);
    }

}
