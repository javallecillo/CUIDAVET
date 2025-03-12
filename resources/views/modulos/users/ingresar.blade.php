@extends('welcome')

@section('ingresar')
<div class="login-box">
  <div class="login-box-body">
    <!-- Logo de la veterinaria -->
    <div class="login-logo">
      <img src="dist/img/logo_cuidavet_azul.png" alt="Logo de CUIDAVET" style="width: 100px">
    </div>
    <!-- Título del formulario -->
    <p class="login-box-msg" style="color: #0d98ba; font-weight: bold; margin-bottom: 1.5rem; font-size: 30px">Iniciar Sesión</p>
    <!-- Formulario de inicio de sesión -->
    <form action="{{ route('loginempleados')}}" method="post">
        @csrf
      <!-- Campo de correo electrónico -->
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Correo electrónico" name="correo" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <!-- Campo de contraseña -->
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="contrasenia" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

        @error('correo')
            <div class="alert alert-danger"><b>Error con el correo o la contraseña.</b></div>
        @enderror

      <!-- Botón de inicio de sesión -->
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection