@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Ventas</h1>
        <div class="text-right">
            <a href="{{ route('ventas.create') }}" class="btn btn-primary">Registrar Venta</a>
        </div>
    </section>
    <section class="content table-responsive">
        <div class="box">
            <div class="box-body table-responsive">

                <!-- Formulario para filtrar por fechas -->
                <div class="mb-2 row">
                    <div class="col-md-6">
                        <h4>Buscar por fecha</h4>
                        <form method="GET" action="{{ route('ventas.index') }}" class="form-inline mb-3">
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

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if($ventas->isEmpty())
                    <div class="alert alert-warning">
                        No hay ventas registradas.
                    </div>
                @else
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="color: white; background-color: #0d98ba;">Cliente</th>
                                <th style="color: white; background-color: #0d98ba;">RTN</th>
                                <th style="color: white; background-color: #0d98ba;">Fecha</th>
                                <th style="color: white; background-color: #0d98ba;">Total</th>
                                <th style="color: white; background-color: #0d98ba;">Estado</th>
                                <th style="color: white; background-color: #0d98ba;">Empleado</th>
                                <th style="color: white; background-color: #0d98ba;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventas as $venta)
                                <tr>
                                    <td>{{ $venta->cliente->nombre }}</td>
                                    <td>{{ $venta->rtn ?? 'Sin RTN' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($venta->fecha)->format('d-m-Y') }}</td>
                                    <td>{{ $venta->total }}</td>
                                    <td>{{ $venta->estado }}</td>
                                    <td>{{ $venta->empleado->nombre ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-info">Mostrar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>
@endsection