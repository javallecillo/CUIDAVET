<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Empleado::create([
            'nombre' => 'Jhair',
            'apellido' => 'Rios',
            'telefono' => '99190502',
            'tel_alternativo' => '',
            'direccion' => 'Barrio Arriba',
            'correo' => 'jhair@gmail.com',
            'contrasenia' => Hash::make('1234'),
            'id_rol' => 2,
            'f_nacimiento' => '1998-01-10',
            'genero' => 'M',
            'foto' => '',
            'f_contratacion' => '2021-12-12',
            'id_departamento' => 1,
            'dias_laborales' => 'Lunes,Miércoles,Viernes',
            'turno' => 'Noche',
            'salario' => 1000,
            'id_moneda' => 1,
            'estado' => 'Activo',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
