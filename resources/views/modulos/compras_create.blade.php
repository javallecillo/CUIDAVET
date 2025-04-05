@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Registrar Compra</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('compras.store') }}" method="POST" onsubmit="return validarFormulario()">
                    @csrf
                    <div class="form-group">
                        <label for="proveedor_id">Proveedor</label>
                        <select name="proveedor_id" class="form-control" required>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" class="form-control" required>
                    </div>
                    
                    <!-- Tabla de productos -->
                    <div class="form-group">
                        <label>Productos a Comprar</label>
                        <table class="table table-bordered" id="productos-table">
                            <thead>
                                <tr>
                                    <th  style="color: white; background-color: #0d98ba;">Producto</th>
                                    <th  style="color: white; background-color: #0d98ba;">Cantidad</th>
                                    <th  style="color: white; background-color: #0d98ba;">Precio</th>
                                    <th  style="color: white; background-color: #0d98ba;">Subtotal</th>
                                    <th  style="color: white; background-color: #0d98ba;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Las filas se agregarán dinámicamente -->
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#productosModal">Agregar Producto</button>
                    </div>

                    <!-- Total -->
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="text" id="total" name="total" class="form-control" readonly required>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Modal para seleccionar productos -->
    <div class="modal fade" id="productosModal" tabindex="-1" role="dialog" aria-labelledby="productosModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productosModalLabel">Seleccionar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm agregar-producto" 
                                                data-id="{{ $producto->id }}" 
                                                data-nombre="{{ $producto->nombre }}"
                                                data-precio="{{ $producto->precio_compra }}"> <!-- Agregar precio de compra -->
                                            Agregar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const productosTable = document.querySelector('#productos-table tbody');
            const totalInput = document.querySelector('#total');

            let total = 0;

            // Agregar producto desde el modal
            document.querySelectorAll('.agregar-producto').forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.dataset.id;
                    const nombre = this.dataset.nombre;
                    const precio = parseFloat(this.dataset.precio) || 0; // Obtener el precio de compra

                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${nombre}<input type="hidden" name="productos[${id}][id]" value="${id}"></td>
                        <td><input type="number" name="productos[${id}][cantidad]" class="form-control cantidad" min="1" value="1"></td>
                        <td><input type="number" name="productos[${id}][precio]" class="form-control precio" step="0.01" value="${precio.toFixed(2)}"></td>
                        <td class="subtotal">${precio.toFixed(2)}</td>
                        <td><button type="button" class="btn btn-danger btn-sm eliminar-producto">Eliminar</button></td>
                    `;
                    productosTable.appendChild(row);

                    actualizarTotal();

                    // Cerrar el modal
                    $('#productosModal').modal('hide');
                });
            });

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
            window.validarFormulario = function () {
                const total = parseFloat(document.querySelector('#total').value) || 0;
                if (total <= 0) {
                    alert('El total debe ser mayor a 0.');
                    return false;
                }
                return true;
            };
        });
    </script>
@endsection