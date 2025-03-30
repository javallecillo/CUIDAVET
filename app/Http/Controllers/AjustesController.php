<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajustes;
use App\Models\Moneda;
use App\Models\Departamento;
use App\Models\Rol;
use App\Models\Nacionalidad;
use App\Models\Servicio;
use Illuminate\Support\Str;  // Agregar esto para generar nombres únicos

class AjustesController extends Controller
{
    public function index()
    {
        $ajustes = Ajustes::find(1);
        $monedas = Moneda::all();
        $departamentos = Departamento::all();
        $roles = Rol::all();
        $nacionalidades = Nacionalidad::all();
        $servicios = Servicio::all();
        return view('modulos.ajustes', compact('ajustes', 'monedas', 'departamentos', 'roles', 'nacionalidades', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        $ajustes = Ajustes::find($id);

        // Validación de la entrada
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'zona_horaria' => 'required|string|max:255',
            'id_moneda' => 'required|exists:monedas,id',
        ]);

        // Verificar si se ha cargado un logo nuevo
        if ($request->hasFile('logo')) {
            // Eliminar el logo anterior si existe
            if (!empty($ajustes->logo)) {
                $path = public_path($ajustes->logo);
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            // Obtener el archivo del logo
            $logo = $request->file('logo');
            // Generar un nombre único para el logo
            $logoName = Str::random(10) . '.' . $logo->getClientOriginalExtension();
            // Guardar el nuevo logo en 'public/dist/img/'
            $logoPath = $logo->storeAs('public/dist/img', $logoName);
            // Actualizar la ruta del logo en la base de datos
            $ajustes->logo = 'dist/img/' . $logoName;
        }

        // Actualizar otros campos
        $ajustes->telefono = $request->telefono;
        $ajustes->direccion = $request->direccion;
        $ajustes->zona_horaria = $request->zona_horaria;
        $ajustes->id_moneda = $request->id_moneda;

        // Guardar los cambios en la base de datos
        $ajustes->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('ajustes.index')->with('success', 'Ajustes actualizados correctamente.');
    }
}
