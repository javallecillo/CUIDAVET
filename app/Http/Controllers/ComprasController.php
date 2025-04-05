<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth; 
use App\Models\Producto;// Agregar esta línea para importar Auth

class ComprasController extends Controller
{
    public function index(Request $request)
    {
        $query = Compra::with('proveedor', 'empleado'); // Cargar las relaciones
    
        // Filtrar por rango de fechas si se proporcionan
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin]);
        } elseif ($request->filled('fecha_inicio')) {
            $query->where('fecha', '>=', $request->fecha_inicio);
        } elseif ($request->filled('fecha_fin')) {
            $query->where('fecha', '<=', $request->fecha_fin);
        }
    
        $compras = $query->get();
    
        return view('modulos.compras', compact('compras'));
    }

    public function create()
    {
        $proveedores = Proveedor::all(); // Obtener proveedores
        $productos = Producto::all(); // Obtener productos del inventario

        return view('modulos.compras_create', compact('proveedores', 'productos')); // Pasar $productos a la vista
    }

    public function store(Request $request)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio' => 'required|numeric|min:0',
        ]);
    
        // Crear la compra
        $compra = Compra::create([
            'proveedor_id' => $request->proveedor_id,
            'fecha' => $request->fecha,
            'total' => $request->total,
            'id_empleado' => Auth::id(), // Asignar el empleado autenticado
        ]);
    
        // Guardar los productos de la compra
        foreach ($request->productos as $productoData) {
            // Crear el detalle de la compra
            $compra->productos()->attach($productoData['id'], [
                'cantidad' => $productoData['cantidad'],
                'precio' => $productoData['precio'],
            ]);
    
            // Actualizar las existencias del producto
            $producto = Producto::find($productoData['id']);
            $producto->cantidad += $productoData['cantidad']; // Sumar las unidades compradas
            $producto->save();
        }
    
        return redirect()->route('compras.index')->with('success', 'Compra registrada correctamente y existencias actualizadas.');
    }

    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $proveedores = Proveedor::all();
        return view('modulos.edit_compras', compact('compra', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:Pendiente,Pagada,Cancelada',
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|numeric|min:1',
            'productos.*.precio' => 'required|numeric|min:0.01',
        ]);

        $compra = Compra::findOrFail($id);

        // Actualizar datos principales de la compra
        $compra->update([
            'proveedor_id' => $request->proveedor_id,
            'fecha' => $request->fecha,
            'total' => $request->total,
            'estado' => $request->estado, // El estado se actualiza aquí
            'id_empleado' => Auth::id(),
        ]);

        // Actualizar productos de la compra
        $productos = $request->input('productos', []);
        $compra->productos()->sync([]); // Eliminar productos existentes

        foreach ($productos as $producto) {
            $compra->productos()->attach($producto['id'], [
                'cantidad' => $producto['cantidad'],
                'precio' => $producto['precio'],
            ]);
        }

        return redirect()->route('compras.index')->with('success', 'Compra actualizada correctamente.');
    }

    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();
        return redirect()->route('compras.index')->with('success', 'Compra eliminada correctamente.');
    }

    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        return view('modulos.compras_show', compact('compra'));
    }
}