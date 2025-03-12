@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Agregar Mascota</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="POST" action="{{ route('mascotas.store') }}" id="formMascota">
                    @csrf
                    
                    <!-- Búsqueda de cliente por DNI -->
                    <div class="form-group">
                        <label for="dni_busqueda">Buscar Cliente por DNI:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="dni_busqueda" placeholder="Ingrese DNI del cliente">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" id="btnBuscarCliente">Buscar</button>
                            </span>
                        </div>
                        <div id="resultado_busqueda" class="mt-2"></div>
                    </div>
                    
                    <!-- Datos del cliente seleccionado -->
                    <div class="form-group">
                        <label for="cliente_nombre">Cliente:</label>
                        <input type="text" class="form-control" id="cliente_nombre" readonly>
                        <input type="hidden" name="cliente_id" id="cliente_id" required>
                    </div>
                    
                    <!-- Datos de la mascota -->
                    <div class="form-group">
                        <label for="nombre">Nombre de la Mascota:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="especie">Especie:</label>
                        <select class="form-control" id="especie" name="especie" required>
                            <option value="">Seleccione una especie</option>
                            @foreach($especies as $especie)
                                <option value="{{ $especie }}" {{ old('especie') == $especie ? 'selected' : '' }}>
                                    {{ $especie }}
                                </option>
                            @endforeach
                        </select>
                        @error('especie')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="raza">Raza:</label>
                        <input type="text" class="form-control" id="raza" name="raza" value="{{ old('raza') }}">
                        @error('raza')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                        @error('fecha_nacimiento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="sexo">Sexo:</label>
                        <select class="form-control" id="sexo" name="sexo" required>
                            <option value="Macho" {{ old('sexo') == 'Macho' ? 'selected' : '' }}>Macho</option>
                            <option value="Hembra" {{ old('sexo') == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                        </select>
                        @error('sexo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="observaciones">Observaciones:</label>
                        <textarea class="form-control" id="observaciones" name="observaciones" rows="3">{{ old('observaciones') }}</textarea>
                        @error('observaciones')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('mascotas.index') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Script para la búsqueda de cliente por DNI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Buscar cliente por DNI
        $('#btnBuscarCliente').click(function() {
            var dni = $('#dni_busqueda').val();
            if (dni.trim() === '') {
                $('#resultado_busqueda').html('<div class="alert alert-warning">Ingrese un DNI para buscar</div>');
                return;
            }
            
            $.ajax({
                url: "{{ route('clientes.buscarPorDni') }}",
                type: "GET",
                data: { dni: dni },
                success: function(response) {
                    console.log('Respuesta completa:', response); // Depuración: Muestra la respuesta completa
                    if (response.success) {
                        console.log('Cliente:', response.cliente); // Depuración: Muestra los datos del cliente
                        $('#cliente_nombre').val(response.cliente.nombre + ' ' + response.cliente.apellido);
                        $('#cliente_id').val(response.cliente.id);
                        $('#resultado_busqueda').html('<div class="alert alert-success">Cliente encontrado: ' + response.cliente.nombre + ' ' + response.cliente.apellido + '</div>');
                    } else {
                        $('#resultado_busqueda').html('<div class="alert alert-danger">Cliente no encontrado</div>');
                        $('#cliente_nombre').val('');
                        $('#cliente_id').val('');
                    }
                },
                error: function() {
                    $('#resultado_busqueda').html('<div class="alert alert-danger">Error en la búsqueda</div>');
                    $('#cliente_nombre').val('');
                    $('#cliente_id').val('');
                }
            });
        });
    });
</script>
@endsection