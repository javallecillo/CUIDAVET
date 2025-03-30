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

            @if($compras->isEmpty())
                <div class="alert alert-warning">
                    No hay compras registradas.
                </div>
            @else
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Proveedor</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Empleado</th> <!-- Nueva columna -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($compras as $compra)
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
                    @endforeach
                </tbody>
                </table>
            @endif
            </div>
        </div>
    </section>
@endsection