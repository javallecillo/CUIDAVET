<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\MonedaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\AjustesController;
use App\Http\Controllers\NacionalidadesController;

Route::get('RegistrarEmpleado', [EmpleadosController::class, 'create']);

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('Inicio');
    } else {
        return redirect()->route('loginempleados');
    }
});

Route::get('/ajustes', [AjustesController::class, 'index'])->name('ajustes.index');
Route::put('/ajustes/{id}', [AjustesController::class, 'update'])->name('ajustes.update');

Route::get('/Clientes', [ClientesController::class, 'index'])->name('Clientes');
Route::get('/Clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::post('/Clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('/Clientes/{id}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/Clientes/{id}', [ClientesController::class, 'update'])->name('clientes.update');
Route::delete('/Clientes/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
Route::get('/clientes/buscar-por-dni', [ClientesController::class, 'buscarPorDni'])->name('clientes.buscarPorDni');

Route::get('/Empleados', [EmpleadosController::class, 'index'])->name('Empleados');
Route::get('/Empleados/create', [EmpleadosController::class, 'create'])->name('empleados.create');
Route::post('/Empleados', [EmpleadosController::class, 'store'])->name('empleados.store');
Route::get('/Empleados/{id}/edit', [EmpleadosController::class, 'edit'])->name('empleados.edit');
Route::put('/Empleados/{id}', [EmpleadosController::class, 'update'])->name('empleados.update');
Route::delete('/Empleados/{id}', [EmpleadosController::class, 'destroy'])->name('empleados.destroy');

use App\Http\Controllers\MascotasController;

// Rutas para mascotas
Route::get('/Mascotas', [MascotasController::class, 'index'])->name('mascotas.index');
Route::get('/Mascotas/create', [MascotasController::class, 'create'])->name('mascotas.create');
Route::post('/Mascotas', [MascotasController::class, 'store'])->name('mascotas.store');
Route::get('/Mascotas/{id}/edit', [MascotasController::class, 'edit'])->name('mascotas.edit');
Route::put('/Mascotas/{id}', [MascotasController::class, 'update'])->name('mascotas.update');
Route::delete('/Mascotas/{id}', [MascotasController::class, 'destroy'])->name('mascotas.destroy');
Route::get('/Mascotas/buscar-cliente', [MascotasController::class, 'buscarCliente'])->name('mascotas.buscarCliente');

use App\Http\Controllers\VeterinarioController;

Route::get('/Veterinarios', [VeterinarioController::class, 'index'])->name('Veterinarios');

Route::get('/Citas', function () {
    return view('modulos.citas');
})->name('Citas');

Route::get('/Internaciones', function () {
    return view('modulos.internaciones');
})->name('Internaciones');

Route::get('/Cajas', function () {
    return view('modulos.cajas');
})->name('Cajas');

use App\Http\Controllers\CategoriasController;

// Reemplaza la ruta existente de categorías con estas nuevas rutas

// Rutas para categorías
Route::get('/Categorias', [CategoriasController::class, 'index'])->name('Categorias');
Route::get('/Categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
Route::post('/Categorias', [CategoriasController::class, 'store'])->name('categorias.store');
Route::get('/Categorias/{id}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
Route::put('/Categorias/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
Route::delete('/Categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');

use App\Http\Controllers\ProductoController;

Route::get('/GestorProductos', [ProductoController::class, 'index'])->name('productos.index');

use App\Http\Controllers\InventarioController;

Route::get('/Inventario', [InventarioController::class, 'index'])->name('inventario.index');

Route::get('/Compras', function () {
    return view('modulos.compras');
})->name('Compras');

Route::get('/Ventas', function () {
    return view('modulos.ventas');
})->name('Ventas');

Route::get('/Informes', function () {
    return view('modulos.informes');
})->name('Informes');

Route::get('/perfil', function () {
    return view('modulos.perfil');
})->name('perfil');

//Route::get('RegistrarEmpleado', [EmpleadosController::class, 'create']);

Auth::routes(['login' => false]); // Deshabilitar la ruta de login predeterminada

// Ruta para el inicio de sesión
Route::get('/loginempleados', [LoginController::class, 'showLoginForm'])->name('loginempleados');
Route::post('/loginempleados', [LoginController::class, 'login'])->name('loginempleados');

// Ruta para la página de inicio
Route::get('/Inicio', function () {
    return view('modulos.Inicio');
})->name('Inicio');

Route::resource('nacionalidades', NacionalidadesController::class)->only(['store', 'destroy']);
Route::resource('nacionalidades', NacionalidadesController::class);
Route::resource('monedas', MonedaController::class);
Route::get('/monedas', [App\Http\Controllers\MonedaController::class, 'index'])->name('monedas.index');
Route::resource('roles', 'App\Http\Controllers\RolController');
Route::resource('departamentos', DepartamentoController::class);
Route::resource('empleados', EmpleadosController::class);

use App\Http\Controllers\ProveedoresController;

Route::resource('proveedores', ProveedoresController::class);
Route::get('/Proveedores', [ProveedoresController::class, 'index'])->name('proveedores');

use App\Http\Controllers\ServicioController;

Route::resource('servicios', ServicioController::class);

Route::resource('productos', ProductoController::class);

Route::resource('veterinarios', VeterinarioController::class);