<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Mostrar listado de categorías
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('modulos.categorias', compact('categorias'));
    }

    /**
     * Mostrar formulario para crear categoría
     */
    public function create()
    {
        return view('modulos.categorias_create');
    }

    /**
     * Guardar nueva categoría
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias'
        ]);

        Categoria::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('Categorias')->with('success', 'Categoría creada correctamente');
    }

    /**
     * Mostrar formulario para editar categoría
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('modulos.categorias_edit', compact('categoria'));
    }

    /**
     * Actualizar categoría
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,'.$id
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('Categorias')->with('success', 'Categoría actualizada correctamente');
    }

    /**
     * Eliminar categoría
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('Categorias')->with('success', 'Categoría eliminada correctamente');
    }
}
