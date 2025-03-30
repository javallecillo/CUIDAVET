<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Proveedor;

class ComprasController extends Controller
{
    public function index()
    {
        $compras = Compra::with('proveedor', 'empleado')->get(); // Cargar las relaciones
        return view('modulos.compras', compact('compras'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('modulos.compras_create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:Pendiente,Pagada,Cancelada',
        ]);

        // Agregar el ID del empleado autenticado
        Compra::create(array_merge($request->all(), [
            'id_empleado' => auth()->id(), // Asegúrate de que auth()->id() devuelva el ID del empleado
        ]));

        return redirect()->route('compras.index')->with('success', 'Compra registrada correctamente.');
    }

    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $proveedores = Proveedor::all();
        return view('modulos.edit_compras', compact('compra', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:Pendiente,Pagada,Cancelada',
        ]);

        $compra = Compra::findOrFail($id);

        // Actualizar la compra con el ID del empleado autenticado
        $compra->update(array_merge($request->all(), [
            'id_empleado' => auth()->id(), 
        ]));

        return redirect()->route('compras.index')->with('success', 'Compra actualizada correctamente.');
    }

    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();
        return redirect()->route('compras.index')->with('success', 'Compra eliminada correctamente.');
    }

    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        return view('modulos.compras_show', compact('compra'));
    }
}