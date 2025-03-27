<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moneda;
use App\Models\Proveedor;

class MonedaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'simbolo' => 'required',
        ]);

        Moneda::create($request->all());

        return redirect()->route('ajustes.index')->with('success', 'Moneda creada exitosamente.');
    }

    public function edit($id)
    {
        $moneda = Moneda::findOrFail($id);
        return view('modulos.editar_moneda', compact('moneda'));
    }

    public function destroy($id)
    {
        $moneda = Moneda::find($id);

        // Verificar si la moneda está siendo utilizada en la tabla proveedores
        $proveedores = Proveedor::where('id_moneda', $id)->count();

        if ($proveedores > 0) {
            return redirect()->route('ajustes.index')->with('error', 'No se puede eliminar la moneda porque está siendo utilizada por proveedores.');
        }

        $moneda->delete();

        return redirect()->route('ajustes.index')->with('success', 'Moneda eliminada correctamente.');
    }

    public function index()
    {
        $monedas = Moneda::all(); // Obtener todas las monedas
        return view('modulos.ajustes', compact('monedas')); // Pasar las monedas a la vista
    }
}
