<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmpleadosController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('Inicio');
    } else {
        return redirect()->route('loginempleados');
    }
});

Route::get('/ajustes', [EmpleadosController::class, 'Ajustes'])->name('ajustes.index');
Route::put('/ajustes/{id}', [EmpleadosController::class, 'update'])->name('ajustes.update');

Route::get('/Clientes', function () {
    return view('modulos.clientes');
})->name('Clientes');

Route::get('/Mascotas', function () {
    return view('modulos.mascotas');
})->name('Mascotas');

Route::get('/Usuarios', function () {
    return view('modulos.usuarios');
})->name('Usuarios');

Route::get('/Veterinarios', function () {
    return view('modulos.veterinarios');
})->name('Veterinarios');

Route::get('/Citas', function () {
    return view('modulos.citas');
})->name('Citas');

Route::get('/Internaciones', function () {
    return view('modulos.internaciones');
})->name('Internaciones');

Route::get('/Cajas', function () {
    return view('modulos.cajas');
})->name('Cajas');

Route::get('/Categorias', function () {
    return view('modulos.categorias');
})->name('Categorias');

Route::get('/GestorProductos', function () {
    return view('modulos.gestor_productos');
})->name('GestorProductos');

Route::get('/Inventario', function () {
    return view('modulos.inventario');
})->name('Inventario');

Route::get('/Compras', function () {
    return view('modulos.compras');
})->name('Compras');

Route::get('/Ventas', function () {
    return view('modulos.ventas');
})->name('Ventas');

Route::get('/Informes', function () {
    return view('modulos.informes');
})->name('Informes');

Auth::routes(['login' => false]); // Deshabilitar la ruta de login predeterminada

// Ruta para el inicio de sesión
Route::get('/loginempleados', [LoginController::class, 'showLoginForm'])->name('loginempleados');
Route::post('/loginempleados', [LoginController::class, 'login'])->name('loginempleados');

// Ruta para la página de inicio
Route::get('/Inicio', function () {
    return view('modulos.Inicio');
})->name('Inicio');