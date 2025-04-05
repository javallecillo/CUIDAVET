@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Proveedores</h1>
        <div class="text-right mb-3">
            <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Agregar Proveedor</a>
        </div>
    </section>
    <section class="content table-responsive">
        <div class="box ">
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
            
                @if($proveedores->isEmpty())
                    <div class="alert alert-warning">
                        No hay proveedores agregados.
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="color: white; background-color: #0d98ba;">Nombre</th>
                                <th style="color: white; background-color: #0d98ba;">Teléfono</th>
                                <th style="color: white; background-color: #0d98ba;">Tipo de Proveedor</th>
                                <th style="color: white; background-color: #0d98ba;">Cuenta de Banco</th>
                                <th style="color: white; background-color: #0d98ba;">Banco</th>
                                <th style="color: white; background-color: #0d98ba;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proveedores as $proveedor)
                                <tr>
                                    <td>{{ $proveedor->nombre }}</td>
                                    <td>{{ $proveedor->telefono }}</td>
                                    <td>{{ $proveedor->tipo_proveedor }}</td>
                                    <td>{{ $proveedor->cuenta_banco }}</td>
                                    <td>{{ $proveedor->banco }}</td>
                                    <td>
                                        <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                        <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-info">Mostrar</a>
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