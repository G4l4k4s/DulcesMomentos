<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los clientes y devolverlos a una vista
        $clients = Clients::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear un nuevo cliente
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar y guardar un nuevo cliente
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lasname' => 'required|string|max:255',
            'indentificationNumber' => 'required|string|unique:clients',
            'email' => 'required|email|unique:clients',
            'phone' => 'required|string|max:15',
        ]);

        Clients::create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar un cliente específico
        $client = Clients::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mostrar el formulario para editar un cliente existente
        $client = Clients::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar y actualizar un cliente existente
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lasname' => 'required|string|max:255',
            'indentificationNumber' => 'required|string|unique:clients,indentificationNumber,' . $id,
            'email' => 'required|email|unique:clients,email,' . $id,
            'phone' => 'required|string|max:15',
        ]);

        $client = Clients::findOrFail($id);
        $client->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar un cliente
        $client = Clients::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
