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

//Route::get('RegistrarEmpleado', [EmpleadosController::class, 'create']);

Auth::routes(['login' => false]); // Deshabilitar la ruta de login predeterminada

// Ruta para el inicio de sesión
Route::get('/loginempleados', [LoginController::class, 'showLoginForm'])->name('loginempleados');
Route::post('/loginempleados', [LoginController::class, 'login'])->name('loginempleados');

// Ruta para la página de inicio
Route::get('/Inicio', function () {
    return view('modulos.Inicio');
})->name('Inicio');