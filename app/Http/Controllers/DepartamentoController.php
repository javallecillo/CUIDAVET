<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('modulos.ajustes', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Departamento::create($request->all());

        return redirect()->route('ajustes.index')->with('success', 'Departamento agregado exitosamente.');
    }

    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);
        return view('modulos.editar_departamento', compact('departamento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $departamento = Departamento::findOrFail($id);
        $departamento->update($request->all());

        return redirect()->route('ajustes.index')->with('success', 'Departamento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();

        return redirect()->route('ajustes.index')->with('success', 'Departamento eliminado exitosamente.');
    }
}
