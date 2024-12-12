<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Clients;
use App\Models\Employe;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        // Obtener todas las órdenes
        $orders = Order::all();
        
        // Retornar las órdenes a la vista o como JSON
        return view('orders.index', compact('orders'));
        // o si es para API
        // return response()->json($orders);
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        // Obtener todos los clientes, empleados y productos para mostrar en el formulario
        $clients = Clients::all();
        $employes = Employe::all();
        $products = Product::all();
        
        return view('orders.create', compact('clients', 'employes', 'products'));
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'clientId' => 'required|exists:clients,id',
            'employeId' => 'required|exists:employes,id',
            'productId' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Crear el pedido
        Order::create([
            'clientId' => $request->clientId,
            'employeId' => $request->employeId,
            'productId' => $request->productId,
            'quantity' => $request->quantity,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    /**
     * Display the specified order.
     */
    public function show(string $id)
    {
        // Obtener el pedido con las relaciones
        $order = Order::with(['client', 'employe', 'product'])->findOrFail($id);

        return view('orders.show', compact('order'));
        // o si es API
        // return response()->json($order);
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(string $id)
    {
        // Obtener el pedido con las relaciones
        $order = Order::findOrFail($id);

        // Obtener todos los clientes, empleados y productos para editar el pedido
        $clients = Clients::all();
        $employes = Employe::all();
        $products = Product::all();

        return view('orders.edit', compact('order', 'clients', 'employes', 'products'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación de los datos del formulario
        $request->validate([
            'clientId' => 'required|exists:clients,id',
            'employeId' => 'required|exists:employes,id',
            'productId' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Encontrar el pedido y actualizarlo
        $order = Order::findOrFail($id);
        $order->update([
            'clientId' => $request->clientId,
            'employeId' => $request->employeId,
            'productId' => $request->productId,
            'quantity' => $request->quantity,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(string $id)
    {
        // Encontrar el pedido y eliminarlo
        $order = Order::findOrFail($id);
        $order->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
