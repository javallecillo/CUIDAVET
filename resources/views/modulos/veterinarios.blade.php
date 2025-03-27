@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Veterinarios</h1>
        <div class="text-right">
            <a href="{{ route('veterinarios.create') }}" class="btn btn-primary">Agregar Veterinario</a>
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
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Especialidad</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($veterinarios as $veterinario)
                        <tr>
                            <td>{{ $veterinario->nombre }}</td>
                            <td>{{ $veterinario->apellido }}</td>
                            <td>{{ $veterinario->telefono }}</td>
                            <td>{{ $veterinario->correo }}</td>
                            <td>{{ $veterinario->especialidad }}</td>
                            <td>{{ $veterinario->estado }}</td>
                            <td>
                                <a href="{{ route('veterinarios.edit', $veterinario->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('veterinarios.destroy', $veterinario->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este veterinario?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay veterinarios registrados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
