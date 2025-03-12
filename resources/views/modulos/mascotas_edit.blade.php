@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Editar Mascota</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="POST" action="{{ route('mascotas.update', $mascota->id) }}" id="formMascota">
                    @csrf
                    @method('PUT')
                    
                    <!-- Datos del cliente -->
                    <div class="form-group">
                        <label for="cliente_nombre">Cliente:</label>
                        <input type="text" class="form-control" id="cliente_nombre" value="{{ $mascota->cliente->nombre }} {{ $mascota->cliente->apellido }} (DNI: {{ $mascota->cliente->dni }})" readonly>
                        <input type="hidden" name="cliente_id" id="cliente_id" value="{{ $mascota->cliente_id }}" required>
                    </div>
                    
                    <!-- Datos de la mascota -->
                    <div class="form-group">
                        <label for="nombre">Nombre de la Mascota:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $mascota->nombre) }}" required>
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="especie">Especie:</label>
                        <select class="form-control" id="especie" name="especie" required>
                            <option value="">Seleccione una especie</option>
                            @foreach($especies as $especie)
                                <option value="{{ $especie }}" {{ old('especie', $mascota->especie) == $especie ? 'selected' : '' }}>
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
                        <input type="text" class="form-control" id="raza" name="raza" value="{{ old('raza', $mascota->raza) }}">
                        @error('raza')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $mascota->fecha_nacimiento) }}">
                        @error('fecha_nacimiento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="sexo">Sexo:</label>
                        <select class="form-control" id="sexo" name="sexo" required>
                            <option value="Macho" {{ old('sexo', $mascota->sexo) == 'Macho' ? 'selected' : '' }}>Macho</option>
                            <option value="Hembra" {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                        </select>
                        @error('sexo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="observaciones">Observaciones:</label>
                        <textarea class="form-control" id="observaciones" name="observaciones" rows="3">{{ old('observaciones', $mascota->observaciones) }}</textarea>
                        @error('observaciones')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                         <button type="submit" class="btn btn-primary">Actualizar</button>
                         <a href="{{ route('mascotas.index') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
