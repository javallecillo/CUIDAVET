<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria; // Importar el modelo de categorías
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Obtener todos los productos
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('modulos.gestor_productos', compact('productos', 'categorias')); // Pasar las variables a la vista
    }

    public function create()
    {
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('modulos.productos_create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'idcategoria' => 'required',
            'codigo' => 'required|unique:productos',
            'cantidad' => 'required|integer',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'estado' => 'required|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        Producto::create($data);
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('modulos.productos_edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'idcategoria' => 'required',
            'codigo' => 'required|unique:productos,codigo,' . $producto->id,
            'cantidad' => 'required|integer',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'estado' => 'required|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $producto->update($data);
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
