@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Citas</h1>
        <div class="text-right">
            <a href="{{ route('citas.create') }}" class="btn btn-primary">Agregar Cita</a>
        </div>
    </section>
    <section class="content table-responsive">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Veterinario</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citas as $cita)
                            <tr>
                                <td>{{ $cita->cliente->nombre }}</td>
                                <td>{{ $cita->veterinario->nombre }}</td>
                                <td>{{ $cita->fecha }}</td>
                                <td>{{ $cita->hora }}</td>
                                <td>{{ $cita->estado }}</td>
                                <td>
                                    <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection