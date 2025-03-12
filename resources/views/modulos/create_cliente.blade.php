@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Agregar Cliente</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    <!-- Campos del formulario -->
                    <div class="form-group col-md-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="genero">Género</label>
                        <select name="genero" class="form-control" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="contrasenia">Contraseña</label>
                        <input type="password" name="contrasenia" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tel_alternativo">Teléfono Alternativo</label>
                        <input type="text" name="tel_alternativo" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="id_nacionalidad">Nacionalidad</label>
                        <select name="id_nacionalidad" class="form-control" required>
                            @foreach($nacionalidades as $nacionalidad)
                                <option value="{{ $nacionalidad->id }}">{{ $nacionalidad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="id_moneda">Moneda</label>
                        <select name="id_moneda" class="form-control" required>
                            @foreach($monedas as $moneda)
                                <option value="{{ $moneda->id }}">{{ $moneda->nombre }} ({{ $moneda->simbolo }})</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control" required>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-md-12 text-right">
                        <a href="{{ route('Clientes') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Regresar
                        </a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection