<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Moneda;

class ProveedoresController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('modulos.proveedores', compact('proveedores'));
    }

    public function create()
    {
        $monedas = Moneda::all();
        return view('modulos.proveedores_create', compact('monedas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'tipo_proveedor' => 'required',
            'cuenta_banco' => 'required',
            'banco' => 'required',
            'forma_pago' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
            'id_moneda' => 'required',
            'estado' => 'required',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $monedas = Moneda::all();
        return view('modulos.proveedores_edit', compact('proveedor', 'monedas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'tipo_proveedor' => 'required',
            'cuenta_banco' => 'required',
            'banco' => 'required',
            'forma_pago' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
            'id_moneda' => 'required',
            'estado' => 'required',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
    }

    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('modulos.proveedores_show', compact('proveedor'));
    }
}
