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
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Empleado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventas as $venta)
                                <tr>
                                    <td>{{ $venta->cliente->nombre }}</td>
                                    <td>{{ $venta->fecha }}</td>
                                    <td>{{ $venta->total }}</td>
                                    <td>{{ $venta->estado }}</td>
                                    <td>{{ $venta->empleado->nombre ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-info">Mostrar</a>
                                        <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
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