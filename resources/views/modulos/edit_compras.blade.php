@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Editar Compra</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('compras.update', $compra->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Proveedor -->
                    <div class="form-group">
                        <label for="proveedor_id">Proveedor</label>
                        <select name="proveedor_id" class="form-control" required>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}" {{ $compra->proveedor_id == $proveedor->id ? 'selected' : '' }}>
                                    {{ $proveedor->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Fecha -->
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" class="form-control" value="{{ $compra->fecha }}" required>
                    </div>

                    <!-- Total -->
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" name="total" class="form-control" step="0.01" value="{{ $compra->total }}" required>
                    </div>

                    <!-- Estado -->
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control" required>
                            <option value="Pendiente" {{ $compra->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="Pagada" {{ $compra->estado == 'Pagada' ? 'selected' : '' }}>Pagada</option>
                            <option value="Cancelada" {{ $compra->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                        </select>
                    </div>

                    <!-- Botones -->
                    <div class="text-right">
                        <a href="{{ route('compras.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Regresar
                        </a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection