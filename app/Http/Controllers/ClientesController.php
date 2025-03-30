<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Moneda;
use App\Models\Nacionalidad;
use Illuminate\Support\Facades\Auth;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('modulos.clientes', compact('clientes'));
    }

    public function create()
    {
        $monedas = Moneda::all();
        $nacionalidades = Nacionalidad::all();
        return view('modulos.create_cliente', compact('monedas', 'nacionalidades'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'dni' => 'required|string|max:255|unique:clientes',
            'contrasenia' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'tel_alternativo' => 'nullable|string|max:255',
            'correo' => 'required|string|email|max:255|unique:clientes',
            'direccion' => 'required|string|max:255',
            'id_nacionalidad' => 'required|integer',
            'id_moneda' => 'required|integer',
            'id_rol' => 'required|integer',
            'estado' => 'required|string|max:255',
        ]);

        try {
            Cliente::create($validatedData);
            return redirect()->route('Clientes')->with('success', 'Cliente creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al guardar el cliente: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $monedas = Moneda::all();
        $nacionalidades = Nacionalidad::all();
        return view('modulos.edit_cliente', compact('cliente', 'monedas', 'nacionalidades'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'dni' => 'required|string|max:255|unique:clientes,dni,' . $id,
            'contrasenia' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'tel_alternativo' => 'nullable|string|max:255',
            'correo' => 'required|string|email|max:255|unique:clientes,correo,' . $id,
            'direccion' => 'required|string|max:255',
            'id_nacionalidad' => 'required|integer',
            'id_moneda' => 'required|integer',
            'id_rol' => 'required|integer',
            'estado' => 'required|string|max:255',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($validatedData);
        return redirect()->route('Clientes')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('Clientes')->with('success', 'Cliente eliminado correctamente.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('correo', 'contrasenia');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard'); // Redirige al dashboard o a la página principal
        }

        return back()->withErrors([
            'correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Buscar cliente por DNI
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
   /**
 * Buscar cliente por DNI
 * 
 * @param Request $request
 * @return \Illuminate\Http\JsonResponse
 */
    public function buscarPorDni(Request $request)
    {
        $dni = $request->input('dni');
        $cliente = Cliente::where('dni', $dni)->first();
        
        if ($cliente) {
            return response()->json([
                'success' => true,
                'cliente' => [
                    'id' => $cliente->id,
                    'nombre' => $cliente->nombre,
                    'apellido' => $cliente->apellido,
                    'nombre_completo' => $cliente->nombre . ' ' . $cliente->apellido,
                    'dni' => $cliente->dni
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cliente no encontrado'
            ]);
        }
    }
}