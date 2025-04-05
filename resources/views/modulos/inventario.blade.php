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
                                <th style="color: white; background-color: #0d98ba;">Nombre</th>
                                <th style="color: white; background-color: #0d98ba;">Categoría</th>
                                <th style="color: white; background-color: #0d98ba;">Código</th>
                                <th style="color: white; background-color: #0d98ba;">Cantidad</th>
                                <th style="color: white; background-color: #0d98ba;">Precio Compra</th>
                                <th style="color: white; background-color: #0d98ba;">Precio Venta</th>
                                <th style="color: white; background-color: #0d98ba;">Estado</th>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>
@endsection