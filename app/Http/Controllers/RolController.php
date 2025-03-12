<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();
        return view('modulos.ajustes', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Rol::create($request->all());

        return redirect()->route('ajustes.index')->with('success', 'Rol agregado exitosamente.');
    }

    public function edit($id)
    {
        $rol = Rol::findOrFail($id);
        return view('modulos.editar_rol', compact('rol'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $rol = Rol::findOrFail($id);
        $rol->update($request->all());

        return redirect()->route('ajustes.index')->with('success', 'Rol actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();

        return redirect()->route('ajustes.index')->with('success', 'Rol eliminado exitosamente.');
    }
}
