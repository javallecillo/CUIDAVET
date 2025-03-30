@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Detalles de la Compra</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Proveedor</th>
                        <td>{{ $compra->proveedor->nombre }}</td>
                    </tr>
                    <tr>
                        <th>Fecha</th>
                        <td>{{ $compra->fecha }}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>{{ $compra->total }}</td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td>{{ $compra->estado }}</td>
                    </tr>
                    <tr>
                        <th>Empleado</th>
                        <td>{{ $compra->empleado->nombre ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Creado el</th>
                        <td>{{ $compra->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Última actualización</th>
                        <td>{{ $compra->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
                <div class="text-right">
                    <a href="{{ route('compras.index') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection