<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('modulos.ajustes', compact('servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Servicio::create($request->all());

        return redirect()->route('ajustes.index')->with('success', 'Servicio agregado exitosamente.');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('modulos.editar_servicio', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $servicio = Servicio::findOrFail($id);
        $servicio->update($request->all());

        return redirect()->route('ajustes.index')->with('success', 'Servicio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();

        return redirect()->route('ajustes.index')->with('success', 'Servicio eliminado exitosamente.');
    }
}
