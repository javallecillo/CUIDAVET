<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajustes;
use App\Models\Moneda;
use App\Models\Departamento;
use App\Models\Rol;
use App\Models\Nacionalidad;
use App\Models\Servicio;

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

        if ($request->hasFile('logo')) {
            // Eliminar el logo anterior si existe
            if (!empty($ajustes->logo)) {
                $path = public_path($ajustes->logo);
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            // Guardar el nuevo logo en 'public/dist/img/'
            $rutaImg = $request->file('logo')->move(public_path('dist/img'), $request->file('logo')->getClientOriginalName());
            $ajustes->logo = 'dist/img/' . $request->file('logo')->getClientOriginalName();
        }

        // Actualizar otros campos
        $ajustes->telefono = $request->telefono;
        $ajustes->direccion = $request->direccion;
        $ajustes->zona_horaria = $request->zona_horaria;
        $ajustes->id_moneda = $request->id_moneda;

        $ajustes->save();

        return redirect()->route('ajustes.index')->with('success', 'Ajustes actualizados correctamente.');
    }
}
