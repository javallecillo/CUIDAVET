@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Editar Venta</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('ventas.update', $venta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Cliente -->
                    <div class="form-group">
                        <label for="cliente_id">Cliente</label>
                        <select name="cliente_id" class="form-control" required>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $venta->cliente_id == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Fecha -->
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" class="form-control" value="{{ $venta->fecha }}" required>
                    </div>

                    <!-- Total -->
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" name="total" class="form-control" step="0.01" value="{{ $venta->total }}" required>
                    </div>

                    <!-- Estado -->
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control" required>
                            <option value="Pendiente" {{ $venta->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="Pagada" {{ $venta->estado == 'Pagada' ? 'selected' : '' }}>Pagada</option>
                            <option value="Cancelada" {{ $venta->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                        </select>
                    </div>

                    <!-- Botones -->
                    <div class="text-right">
                        <a href="{{ route('ventas.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Regresar
                        </a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection