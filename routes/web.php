<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmpleadosController;

Route::get('/', function () {
    return view('modulos.usuarios.IngresarEmpleados');
    //return view('welcome');
});

//Route::get('RegistrarEmpleado', [EmpleadosController::class, 'create']);

Auth::routes();

// Ruta para el inicio de sesión
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Ruta para la página de inicio
Route::get('/Inicio', function () {
    return view('modulos.Inicio');
})->name('Inicio');