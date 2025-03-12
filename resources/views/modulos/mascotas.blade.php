@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Mascotas</h1>
        <div class="text-right">
            <a href="{{ route('mascotas.create') }}" class="btn btn-primary">Agregar Mascota</a>
        </div>
    </section>
    <section class="content table-responsive">
        <div class="box">
            <div class="box-body table-responsive">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('success') }}
                    </div>
                @endif
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dueño</th>
                            <th>DNI Dueño</th>
                            <th>Especie</th>
                            <th>Raza</th>
                            <th>Sexo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mascotas as $mascota)
                        <tr>
                            <td>{{ $mascota->nombre }}</td>
                            <td>{{ $mascota->cliente->nombre }} {{ $mascota->cliente->apellido }}</td>
                            <td>{{ $mascota->cliente->dni }}</td>
                            <td>{{ $mascota->especie }}</td>
                            <td>{{ $mascota->raza ?? 'No especificada' }}</td>
                            <td>{{ $mascota->sexo }}</td>
                            <td>
                                <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar esta mascota?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay mascotas registradas</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
