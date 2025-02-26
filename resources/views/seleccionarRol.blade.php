@extends('welcome')

@section('content')
<div class="role-selection">
    <h2>Seleccione su rol para iniciar sesión</h2>
    <div class="role-buttons">
        <a href="{{ route('loginclientes') }}" class="btn btn-primary">Iniciar sesión como Cliente</a>
        <a href="{{ route('loginempleados') }}" class="btn btn-primary">Iniciar sesión como Empleado</a>
    </div>
</div>
@endsection