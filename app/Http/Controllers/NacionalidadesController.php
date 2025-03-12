<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nacionalidad;

class NacionalidadesController extends Controller
{
    public function index()
    {
        $nacionalidades = Nacionalidad::all();
        return view('modulos.ajustes', compact('nacionalidades'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Nacionalidad::create($request->all());

        return redirect()->route('ajustes.index')->with('success', 'Nacionalidad agregada exitosamente.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $nacionalidad = Nacionalidad::findOrFail($id);
        return view('modulos.editar_nacionalidad', compact('nacionalidad'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $nacionalidad = Nacionalidad::findOrFail($id);
        $nacionalidad->update($request->all());

        return redirect()->route('ajustes.index')->with('success', 'Nacionalidad actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $nacionalidad = Nacionalidad::findOrFail($id);
        $nacionalidad->delete();

        return redirect()->route('ajustes.index')->with('success', 'Nacionalidad eliminada exitosamente.');
    }
}
