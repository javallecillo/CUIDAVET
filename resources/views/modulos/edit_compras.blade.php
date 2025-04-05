@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Editar Compra</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('compras.update', $compra->id) }}" method="POST" onsubmit="return validarFormulario()">
                    @csrf
                    @method('PUT')

                    <!-- Proveedor -->
                    <div class="form-group">
                        <label for="proveedor_id">Proveedor</label>
                        <select name="proveedor_id" class="form-control" readonly>
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
                        <input type="date" name="fecha" class="form-control" value="{{ $compra->fecha }}" readonly>
                    </div>

                    <!-- Estado -->
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control">
                            <option value="Pendiente" {{ $compra->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="Pagada" {{ $compra->estado == 'Pagada' ? 'selected' : '' }}>Pagada</option>
                            <option value="Cancelada" {{ $compra->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                        </select>
                    </div>

                    <!-- Tabla de productos -->
                    <div class="form-group">
                        <label>Productos a Editar</label>
                        <table class="table table-bordered" id="productos-table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($compra->productos as $producto)
                                    <tr>
                                        <td>{{ $producto->nombre }}
                                            <input type="hidden" name="productos[{{ $producto->id }}][id]" value="{{ $producto->id }}">
                                        </td>
                                        <td><input type="number" name="productos[{{ $producto->id }}][cantidad]" class="form-control cantidad" min="1" value="{{ $producto->pivot->cantidad }}"></td>
                                        <td><input type="number" name="productos[{{ $producto->id }}][precio]" class="form-control precio" step="0.01" value="{{ $producto->pivot->precio }}"></td>
                                        <td class="subtotal">{{ number_format($producto->pivot->cantidad * $producto->pivot->precio, 2) }}</td>
                                        <td><button type="button" class="btn btn-danger btn-sm eliminar-producto">Eliminar</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Botón de agregar producto eliminado -->
                    </div>

                    <!-- Total -->
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="text" id="total" name="total" class="form-control" value="{{ $compra->total }}" readonly required>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const productosTable = document.querySelector('#productos-table tbody');
            const totalInput = document.querySelector('#total');

            let total = parseFloat(totalInput.value) || 0;

            // Actualizar total al cambiar cantidad o precio
            productosTable.addEventListener('input', function (e) {
                if (e.target.classList.contains('cantidad') || e.target.classList.contains('precio')) {
                    const row = e.target.closest('tr');
                    const cantidad = parseFloat(row.querySelector('.cantidad').value) || 0;
                    const precio = parseFloat(row.querySelector('.precio').value) || 0;
                    const subtotal = cantidad * precio;

                    row.querySelector('.subtotal').textContent = subtotal.toFixed(2);

                    actualizarTotal();
                }
            });

            // Eliminar producto
            productosTable.addEventListener('click', function (e) {
                if (e.target.classList.contains('eliminar-producto')) {
                    e.target.closest('tr').remove();
                    actualizarTotal();
                }
            });

            // Actualizar total general
            function actualizarTotal() {
                total = 0;
                productosTable.querySelectorAll('tr').forEach(row => {
                    const subtotal = parseFloat(row.querySelector('.subtotal').textContent) || 0;
                    total += subtotal;
                });
                totalInput.value = total.toFixed(2);
            }

            // Validar formulario antes de enviar
            function validarFormulario() {
                const total = parseFloat(document.querySelector('#total').value) || 0;
                if (total <= 0) {
                    alert('El total debe ser mayor a 0.');
                    return false;
                }
                alert('Compra confirmada correctamente.');
                return true;
            }
        });
    </script>
@endsection