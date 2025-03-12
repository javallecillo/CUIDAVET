<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Cliente;

class MascotasController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::with('cliente')->get();
        return view('modulos.mascotas', compact('mascotas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $especies = ['Perro', 'Gato', 'Ave', 'Reptil', 'Roedor', 'Otro'];
        return view('modulos.mascotas_create', compact('clientes', 'especies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'required|in:Macho,Hembra',
            'observaciones' => 'nullable|string',
        ]);

        $mascota = Mascota::create($request->all());

        // Cambiado a mascotas.index
        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota creada exitosamente.');
    }

    public function edit($id)
    {
        $mascota = Mascota::with('cliente')->findOrFail($id);
        $especies = ['Perro', 'Gato', 'Ave', 'Reptil', 'Roedor', 'Otro'];
        $clientes = Cliente::all();
        return view('modulos.mascotas_edit', compact('mascota', 'especies', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'required|string|in:Macho,Hembra',
            'observaciones' => 'nullable|string',
        ]);

        $mascota = Mascota::findOrFail($id);
        $mascota->update($validatedData);
        
        // Ya está usando mascotas.index
        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota actualizada correctamente.');
    }

    public function destroy($id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->delete();
        
        // Cambiado a mascotas.index
        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota eliminada correctamente.');
    }

    public function buscarCliente(Request $request)
    {
        return redirect()->route('clientes.buscarPorDni', ['dni' => $request->input('dni')]);
    }
}
