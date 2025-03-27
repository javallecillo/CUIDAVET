@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Inventario</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                @if ($productos->isEmpty())
                    <p class="text-center">No se encuentran productos registrados en el inventario.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Código</th>
                                <th>Cantidad</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>
                                        @if ($producto->imagen)
                                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" width="100">
                                        @else
                                            Sin imagen
                                        @endif
                                    </td>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>
@endsection