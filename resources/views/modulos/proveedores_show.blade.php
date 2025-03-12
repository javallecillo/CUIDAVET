@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Detalles del Proveedor</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Información del Proveedor</h3>
                        <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
                        <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
                        <p><strong>Teléfono Alternativo:</strong> {{ $proveedor->tel_alternativo }}</p>
                        <p><strong>Tipo de Proveedor:</strong> {{ $proveedor->tipo_proveedor }}</p>
                        <p><strong>Cuenta de Banco:</strong> {{ $proveedor->cuenta_banco }}</p>
                        <p><strong>Banco:</strong> {{ $proveedor->banco }}</p>
                        <p><strong>Forma de Pago:</strong> {{ $proveedor->forma_pago }}</p>
                        <p><strong>Correo:</strong> {{ $proveedor->correo }}</p>
                        <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
                        <p><strong>Moneda:</strong> {{ $proveedor->moneda->nombre }}</p>
                        <p><strong>Estado:</strong> {{ $proveedor->estado }}</p>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <a href="{{ route('proveedores.index') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
