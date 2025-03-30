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
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\EspecialidadesController;

// Ruta principal
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('Inicio');
    } else {
        return redirect()->route('loginempleados');
    }
});

// Rutas de autenticación
Auth::routes(['login' => false]); // Deshabilitar la ruta de login predeterminada
Route::get('/loginempleados', [LoginController::class, 'showLoginForm'])->name('loginempleados');
Route::post('/loginempleados', [LoginController::class, 'login'])->name('loginempleados');

// Ruta para la página de inicio
Route::get('/Inicio', function () {
    return view('modulos.Inicio');
})->name('Inicio');

// Rutas para ajustes
Route::get('/ajustes', [AjustesController::class, 'index'])->name('ajustes.index');
Route::put('/ajustes/{id}', [AjustesController::class, 'update'])->name('ajustes.update');

// Rutas para empleados
Route::resource('empleados', EmpleadosController::class);
Route::get('/Empleados', [EmpleadosController::class, 'index'])->name('Empleados');
Route::get('/RegistrarEmpleado', [EmpleadosController::class, 'create']);

// Rutas para clientes
Route::resource('clientes', ClientesController::class);
Route::get('/Clientes', [ClientesController::class, 'index'])->name('Clientes');
Route::get('/clientes/buscar-por-dni', [ClientesController::class, 'buscarPorDni'])->name('clientes.buscarPorDni');

// Rutas para mascotas
Route::resource('mascotas', MascotasController::class);
Route::get('/Mascotas', [MascotasController::class, 'index'])->name('mascotas.index');
Route::get('/Mascotas/buscar-cliente', [MascotasController::class, 'buscarCliente'])->name('mascotas.buscarCliente');

// Rutas para categorías
Route::resource('categorias', CategoriasController::class);
Route::get('/Categorias', [CategoriasController::class, 'index'])->name('Categorias');

// Rutas para especialidades
Route::resource('especialidades', EspecialidadesController::class);
Route::get('/Especialidades', [EspecialidadesController::class, 'index'])->name('Especialidades');

// Rutas para productos
Route::resource('productos', ProductoController::class);
Route::get('/GestorProductos', [ProductoController::class, 'index'])->name('productos.index');

// Rutas para inventario
Route::get('/Inventario', [InventarioController::class, 'index'])->name('inventario.index');

// Rutas para proveedores
Route::resource('proveedores', ProveedoresController::class);
Route::get('/Proveedores', [ProveedoresController::class, 'index'])->name('proveedores');

// Rutas para servicios
Route::resource('servicios', ServicioController::class);

// Rutas para compras
Route::resource('compras', ComprasController::class);
Route::get('/Compras', [ComprasController::class, 'index'])->name('compras');

// Rutas para ventas
Route::resource('ventas', VentasController::class);
Route::get('/Ventas', [VentasController::class, 'index'])->name('ventas');

// Rutas para citas
Route::resource('citas', CitasController::class);
Route::get('/Citas', [CitasController::class, 'index'])->name('citas');

// Rutas para internaciones
Route::get('/Internaciones', function () {
    return view('modulos.internaciones');
})->name('Internaciones');

// Rutas para cajas
Route::get('/Cajas', function () {
    return view('modulos.cajas');
})->name('Cajas');

// Rutas para veterinarios
Route::get('/Veterinarios', function () {
    return view('modulos.veterinarios');
})->name('Veterinarios');

// Rutas para informes
Route::get('/Informes', function () {
    return view('modulos.informes');
})->name('Informes');

// Ruta para perfil
Route::get('/perfil', function () {
    return view('modulos.perfil');
})->name('perfil');

// Rutas para nacionalidades
Route::resource('nacionalidades', NacionalidadesController::class);

// Rutas para monedas
Route::resource('monedas', MonedaController::class);
Route::get('/monedas', [MonedaController::class, 'index'])->name('monedas.index');

// Rutas para roles
Route::resource('roles', RolController::class);

// Rutas para departamentos
Route::resource('departamentos', DepartamentoController::class);