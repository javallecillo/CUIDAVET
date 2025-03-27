@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Editar Producto</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="idcategoria">Categoría</label>
                        <select name="idcategoria" id="idcategoria" class="form-control" required>
                            <option value="">Seleccione una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $producto->idcategoria == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text" name="codigo" id="codigo" class="form-control" value="{{ $producto->codigo }}" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $producto->cantidad }}" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="form-control">
                        @if ($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" width="100">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio_compra">Precio Compra</label>
                        <input type="number" step="0.01" name="precio_compra" id="precio_compra" class="form-control" value="{{ $producto->precio_compra }}" required>
                    </div>
                    <div class="form-group">
                        <label for="precio_venta">Precio Venta</label>
                        <input type="number" step="0.01" name="precio_venta" id="precio_venta" class="form-control" value="{{ $producto->precio_venta }}" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="1" {{ $producto->estado ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ !$producto->estado ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </section>
@endsection
