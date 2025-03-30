<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Empleado;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente', 'empleado')->get();
        return view('modulos.ventas', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('modulos.ventas_create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:Pendiente,Pagada,Cancelada',
        ]);

        Venta::create(array_merge($request->all(), [
            'id_empleado' => auth()->id(),
        ]));

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente.');
    }

    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return view('modulos.ventas_show', compact('venta'));
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $clientes = Cliente::all();
        return view('modulos.ventas_edit', compact('venta', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:Pendiente,Pagada,Cancelada',
        ]);

        $venta = Venta::findOrFail($id);

        $venta->update(array_merge($request->all(), [
            'id_empleado' => auth()->id(),
        ]));

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
    }
}