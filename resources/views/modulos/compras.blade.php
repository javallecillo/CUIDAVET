@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Compras</h1>
        <div class="text-right">
            <a href="{{ route('compras.create') }}" class="btn btn-primary">Registrar Compra</a>
        </div>
    </section>
    <section class="content table-responsive">
        <div class="box">
            <div class="box-body table-responsive">

            <!-- Formulario para filtrar por fechas -->
            <div class="mb-2 row">

                <div class="col-md-6">

                    <h4>Buscar por fecha</h4>

                    <form method="GET" action="{{ route('compras.index') }}" class="form-inline mb-3">
                        <div class="col-md-5 form-group">
                            <label for="fecha_inicio">Desde:</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
                        </div>
                        <div class="col-md-5 form-group mx-sm-3">
                            <label for="fecha_fin">Hasta:</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>

                        
                    </form>

                </div>
            </div>
            <br>
            <!-- Fin del formulario -->

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="color: white; background-color: #0d98ba;">Proveedor</th>
                        <th style="color: white; background-color: #0d98ba;">Fecha</th>
                        <th style="color: white; background-color: #0d98ba;">Total</th>
                        <th style="color: white; background-color: #0d98ba;">Estado</th>
                        <th style="color: white; background-color: #0d98ba;">Empleado</th> <!-- Nueva columna -->
                        <th style="color: white; background-color: #0d98ba;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($compras as $compra)
                        <tr>
                            <td>{{ $compra->proveedor->nombre }}</td>
                            <td>{{ $compra->fecha }}</td>
                            <td>{{ $compra->total }}</td>
                            <td>{{ $compra->estado }}</td>
                            <td>{{ $compra->empleado->nombre ?? 'N/A' }}</td> <!-- Mostrar el nombre del empleado -->
                            <td>
                                <a href="{{ route('compras.show', $compra->id) }}" class="btn btn-info">Mostrar</a>
                                <a href="{{ route('compras.edit', $compra->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('compras.destroy', $compra->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay veterinarios registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection