@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Detalles de la Venta</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Cliente</th>
                        <td>{{ $venta->cliente->nombre }}</td>
                    </tr>
                    <tr>
                        <th>Empleado</th>
                        <td>{{ $venta->empleado->nombre ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Fecha</th>
                        <td>{{ $venta->fecha }}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>{{ $venta->total }}</td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td>{{ $venta->estado }}</td>
                    </tr>
                    <tr>
                        <th>Creado el</th>
                        <td>{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Última actualización</th>
                        <td>{{ $venta->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
                <div class="text-right">
                    <a href="{{ route('ventas.index') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection