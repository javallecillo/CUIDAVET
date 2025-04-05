<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Moneda;
use App\Models\Nacionalidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClientesController extends Controller
{
    public function index(Request $request)
    {
        $query = Cliente::query();
    
        // Filtrar por nombre o apellido si se proporciona un término de búsqueda
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nombre', 'like', "%$search%")
                  ->orWhere('apellido', 'like', "%$search%");
        }
    
        $clientes = $query->get();
    
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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'genero' => 'required|string',
            'dni' => 'required|string|max:20|unique:clientes,dni',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email|unique:clientes,correo',
            'direccion' => 'required|string|max:255',
            'id_nacionalidad' => 'required|exists:nacionalidades,id',
            'id_moneda' => 'required|exists:monedas,id',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $monedas = Moneda::all();
        $nacionalidades = Nacionalidad::all();
        return view('modulos.edit_cliente', compact('cliente', 'monedas', 'nacionalidades'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'genero' => 'required|string',
            'dni' => 'required|string|max:20|unique:clientes,dni,' . $cliente->id,
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email|unique:clientes,correo,' . $cliente->id,
            'direccion' => 'required|string|max:255',
            'id_nacionalidad' => 'required|exists:nacionalidades,id',
            'id_moneda' => 'required|exists:monedas,id',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
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
    public function buscarPorDni(Request $request)
    {
        Log::info('Método buscarPorDni llamado con DNI: ' . $request->input('dni'));

        $dni = $request->input('dni');
        $cliente = Cliente::where('dni', $dni)->first();

        if ($cliente) {
            return response()->json([
                'success' => true,
                'cliente' => $cliente
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cliente no encontrado'
            ]);
        }
    }
}