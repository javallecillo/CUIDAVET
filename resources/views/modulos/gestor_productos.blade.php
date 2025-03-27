@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Gestor de Productos</h1>
        <div class="text-right">
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Agregar Producto</a>
    </div>
    </section>
    
    <section class="content">
        <div class="box">
            <div class="box-body">
                @if ($productos->isEmpty())
                    <p class="text-center">No se encuentran productos registrados.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Código</th>
                                <th>Cantidad</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>
                                        @php
                                            $categoria = $categorias->firstWhere('id', $producto->idcategoria);
                                        @endphp
                                        {{ $categoria ? $categoria->nombre : 'Sin categoría' }}
                                    </td>
                                    <td>{{ $producto->codigo }}</td>
                                    <td>{{ $producto->cantidad }}</td>
                                    <td>{{ $producto->precio_compra }}</td>
                                    <td>{{ $producto->precio_venta }}</td>
                                    <td>{{ $producto->estado ? 'Activo' : 'Inactivo' }}</td>
                                    <td>
                                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
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