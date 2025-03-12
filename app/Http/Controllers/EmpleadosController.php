<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Ajustes;
use App\Models\Moneda;
use App\Models\Departamento;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    public function Ajustes()
    {
        $ajustes = Ajustes::find(1);
        $monedas = Moneda::all(); // Obtén todas las monedas
        return view('modulos.ajustes', compact('ajustes', 'monedas'));
    }

    public function index()
    {
        $empleados = Empleado::all();
        return view('modulos.empleados', compact('empleados'));
    }

    public function create()
    {
        
        $monedas = Moneda::all();
        $departamentos = Departamento::all();
        $roles = Rol::all();
        return view('modulos.create_empleado', compact('monedas', 'departamentos', 'roles'));
        /*
        Empleado::create([
            'nombre' => 'Jhair',
            'apellido' => 'Rios',
            'telefono' => '96595294',
            'tel_alternativo' => '',
            'direccion' => 'Barrio El Centro',
            'correo' => 'jhair@gmail.com',
            'contrasenia' => Hash::make('1234'),
            'id_rol' => 1,
            'f_nacimiento' => '1999-12-12',
            'genero' => 'M',
            'foto' => '',
            'f_contratacion' => '2021-12-12',
            'id_departamento' => 1,
            'dias_laborales' => 'Lunes,Martes,Miércoles',
            'turno' => 'Tarde',
            'salario' => 1000,
            'id_moneda' => 1,
            'estado' => 1,

        ]);*/
        }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'contrasenia' => 'required',
            'id_rol' => 'required',
            'f_nacimiento' => 'required|date',
            'genero' => 'required',
            'fecha_contratacion' => 'required|date',
            'id_departamento' => 'required',
            'dias_laborales' => 'required',
            'turno' => 'required',
            'salario' => 'required|numeric',
            'id_moneda' => 'required',
            'estado' => 'required',
        ]);

        Empleado::create($request->all());

        return redirect()->route('Empleados')->with('success', 'Empleado creado exitosamente.');
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $monedas = Moneda::all();
        $departamentos = Departamento::all();
        $roles = Rol::all();
        return view('modulos.edit_empleado', compact('empleado', 'monedas', 'departamentos', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'id_rol' => 'required',
            'f_nacimiento' => 'required|date',
            'genero' => 'required',
            'fecha_contratacion' => 'required|date',
            'id_departamento' => 'required',
            'dias_laborales' => 'required',
            'turno' => 'required',
            'salario' => 'required|numeric',
            'id_moneda' => 'required',
            'estado' => 'required',
        ]);

        $empleado = Empleado::findOrFail($id);

        $data = $request->all();

        // Si la contraseña no está vacía, actualizarla
        if (!empty($data['contrasenia'])) {
            $data['contrasenia'] = Hash::make($data['contrasenia']);
        } else {
            // Si la contraseña está vacía, eliminarla del array de datos
            unset($data['contrasenia']);
        }

        $empleado->update($data);

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('Empleados')->with('success', 'Empleado eliminado correctamente.');
    }

    public function updateAjustes(Request $request, $id)
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
