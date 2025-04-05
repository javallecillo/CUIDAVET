@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Empleados</h1>
        <div class="text-right">
            <a href="{{ route('empleados.create') }}" class="btn btn-primary">Agregar Empleado</a>
        </div>
    </section>
    <section class="content table-responsive">
        <div class="box">
            <div class="box-body table-responsive">
                <div class="section">
                    <div class="mb-2 row">
                        <!-- Formulario para buscar empleados -->
                        <div class="col-md-6">
                            <h4>Buscar Empleado</h4>
                            <form action="{{ route('empleados.index') }}" method="GET" class="d-flex align-items-center gap-2">
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar por nombre o apellido..." value="{{ request('search') }}">
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="color: white; background-color: #0d98ba;">DNI</th>
                            <th style="color: white; background-color: #0d98ba;">Nombre</th>
                            <th style="color: white; background-color: #0d98ba;">Apellido</th>
                            <th style="color: white; background-color: #0d98ba;">Teléfono</th>
                            <th style="color: white; background-color: #0d98ba;">Correo</th>
                            <th style="color: white; background-color: #0d98ba;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->dni }}</td>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->apellido }}</td>
                                <td>{{ $empleado->telefono }}</td>
                                <td>{{ $empleado->correo }}</td>
                                <td>
                                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection