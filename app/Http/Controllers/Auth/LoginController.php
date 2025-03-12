<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('modulos.users.ingresar'); // Asegúrate de que esta vista exista
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasenia' => 'required',
        ]);

        if (Auth::attempt($this->credentials($request))) {
            return redirect()->route('Inicio');
        }

        return back()->withErrors(['correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.']);
    }

    protected function credentials(Request $request)
    {
        return [
            'correo' => $request->get('correo'),
            'password' => $request->get('contrasenia'),
        ];
    }
}