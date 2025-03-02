<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajustes;
use App\Models\Moneda;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Ajustes()
    {
        $ajustes = Ajustes::first(); // Obtén los ajustes (ajusta según tu lógica)
        $monedas = Moneda::all(); // Obtén todas las monedas

        if (!$ajustes) {
            return redirect()->route('Inicio')->with('error', 'No se encontraron ajustes.');
        }

        return view('modulos.ajustes', compact('ajustes', 'monedas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'telefono' => 'required',
            'direccion' => 'required',
            'zona_horaria' => 'required',
            'id_moneda' => 'required|exists:monedas,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $messages = [
            'telefono.required' => 'El teléfono es requerido.',
            'direccion.required' => 'La dirección es requerida.',
            'zona_horaria.required' => 'La zona horaria es requerida.',
            'id_moneda.required' => 'La moneda es requerida.',
            'id_moneda.exists' => 'La moneda seleccionada no es válida.',
            'logo.image' => 'El archivo debe ser una imagen.',
            'logo.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg, gif o svg.',
            'logo.max' => 'La imagen no debe superar los 2MB.'
        ];

        $request->validate($rules, $messages);

        $ajustes = Ajustes::findOrFail($id);

        $ajustes->update([
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'zona_horaria' => $request->zona_horaria,
            'id_moneda' => $request->id_moneda
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $customFileName = uniqid() . '.' . $file->extension();
            $file->storeAs('public/logos', $customFileName);
            $imageTemp = $ajustes->logo; // imagen temporal
            $ajustes->logo = 'logos/' . $customFileName;
            $ajustes->save();

            if ($imageTemp != null) {
                if (Storage::disk('public')->exists($imageTemp)) {
                    Storage::disk('public')->delete($imageTemp);
                }
            }
        }

        return redirect()->route('ajustes.index')->with('success', 'Ajustes actualizados correctamente.');
    }
}