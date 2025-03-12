@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Editar Proveedor</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Campos del formulario -->
                    <div class="form-group col-md-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $proveedor->nombre }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ $proveedor->telefono }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tel_alternativo">Teléfono Alternativo</label>
                        <input type="text" name="tel_alternativo" class="form-control" value="{{ $proveedor->tel_alternativo }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tipo_proveedor">Tipo de Proveedor</label>
                        <input type="text" name="tipo_proveedor" class="form-control" value="{{ $proveedor->tipo_proveedor }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cuenta_banco">Cuenta de Banco</label>
                        <input type="text" name="cuenta_banco" class="form-control" value="{{ $proveedor->cuenta_banco }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="banco">Banco</label>
                        <input type="text" name="banco" class="form-control" value="{{ $proveedor->banco }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="forma_pago">Forma de Pago</label>
                        <input type="text" name="forma_pago" class="form-control" value="{{ $proveedor->forma_pago }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" class="form-control" value="{{ $proveedor->correo }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $proveedor->direccion }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="id_moneda">Moneda</label>
                        <select name="id_moneda" class="form-control" required>
                            @foreach($monedas as $moneda)
                                <option value="{{ $moneda->id }}" {{ $proveedor->id_moneda == $moneda->id ? 'selected' : '' }}>
                                    {{ $moneda->nombre }} ({{ $moneda->simbolo }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control" required>
                            <option value="Activo" {{ $proveedor->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ $proveedor->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <div class="col-md-12 text-right">
                        <a href="{{ route('proveedores.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Regresar
                        </a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
