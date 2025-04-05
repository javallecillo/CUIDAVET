<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Veterinario;
use Illuminate\Http\Request;

class VeterinarioController extends Controller
{
    /**
     * Muestra la lista de veterinarios (empleados con el rol de doctor).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Filtrar empleados con el rol de "doctor"
        $veterinarios = Empleado::where('id_rol', 1)->get(); // Suponiendo que el rol "doctor" tiene el ID 2
        return view('modulos.veterinarios', compact('veterinarios'));
    }

    public function create()
    {
        return view('modulos.veterinarios_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email|unique:veterinarios',
            'especialidad' => 'required',
        ]);

        Veterinario::create($request->all());
        return redirect()->route('veterinarios.index');
    }

    public function edit(Veterinario $veterinario)
    {
        return view('modulos.veterinarios_edit', compact('veterinario'));
    }

    public function update(Request $request, Veterinario $veterinario)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email|unique:veterinarios,correo,' . $veterinario->id,
            'especialidad' => 'required',
        ]);

        $veterinario->update($request->all());
        return redirect()->route('veterinarios.index');
    }

    public function destroy(Veterinario $veterinario)
    {
        $veterinario->delete();
        return redirect()->route('veterinarios.index');
    }
}
