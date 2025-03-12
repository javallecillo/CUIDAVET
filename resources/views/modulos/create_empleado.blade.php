@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Agregar Empleado</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('empleados.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tel_alternativo">Teléfono Alternativo</label>
                        <input type="text" name="tel_alternativo" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="contrasenia">Contraseña</label>
                        <input type="password" name="contrasenia" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="id_rol">Rol</label>
                        <select name="id_rol" class="form-control" required>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="f_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="f_nacimiento" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="genero">Género</label>
                        <select name="genero" class="form-control" required>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fecha_contratacion">Fecha de Contratación</label>
                        <input type="date" name="fecha_contratacion" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="id_departamento">Departamento</label>
                        <select name="id_departamento" class="form-control" required>
                            @foreach($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dias_laborales">Días Laborales</label>
                        <input type="text" name="dias_laborales" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="turno">Turno</label>
                        <select name="turno" class="form-control" required>
                            <option value="Manana">Mañana</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noche">Noche</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="salario">Salario</label>
                        <input type="number" name="salario" class="form-control" required>
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
                        <a href="{{ route('Empleados') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Regresar
                        </a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection