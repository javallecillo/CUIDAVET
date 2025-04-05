<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformesController extends Controller
{
    public function index()
    {
        // Lógica para obtener las estadísticas
        $compras = \App\Models\Compra::count();
        $ventas = \App\Models\Venta::count();
        $mascotas = \App\Models\Mascota::count();
        $citas_confirmadas = \App\Models\Cita::where('estado', 'confirmada')->count();

        // Pasar las variables a la vista
        return view('modulos.informes', compact('compras', 'ventas', 'mascotas', 'citas_confirmadas'));
    }
}
