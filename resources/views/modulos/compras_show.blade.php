@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1 class="text-center">Detalles de la Compra</h1>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Información de la Compra</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
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
                        <td>
                            <span class="badge {{ $compra->estado == 'Completado' ? 'badge-success' : 'badge-warning' }}">
                                {{ $compra->estado }}
                            </span>
                        </td>
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
                <h4 class="mt-4">Productos Comprados</h4>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compra->productos as $producto)
                            <tr>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->pivot->cantidad }}</td>
                                <td>{{ number_format($producto->pivot->precio_unitario, 2) }}</td>
                                <td>{{ number_format($producto->pivot->cantidad * $producto->pivot->precio_unitario, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right mt-3">
                    <a href="{{ route('compras.index') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection