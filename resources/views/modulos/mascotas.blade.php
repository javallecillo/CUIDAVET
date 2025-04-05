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
                
                <div class="section">
                    <div class="mb-2 row">
                        <!-- Formulario para buscar mascotas -->
                        <div class="col-md-6">
                            <h4>Buscar Mascota</h4>
                            <form action="{{ route('mascotas.index') }}" method="GET" class="d-flex align-items-center gap-2">
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar por nombre o dueño..." value="{{ request('search') }}">
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="color: white; background-color: #0d98ba;">Nombre</th>
                            <th style="color: white; background-color: #0d98ba;">Especie</th>
                            <th style="color: white; background-color: #0d98ba;">Raza</th>
                            <th style="color: white; background-color: #0d98ba;">Dueño</th>
                            <th style="color: white; background-color: #0d98ba;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mascotas as $mascota)
                            <tr>
                                <td>{{ $mascota->nombre }}</td>
                                <td>{{ $mascota->especie }}</td>
                                <td>{{ $mascota->raza }}</td>
                                <td>{{ $mascota->cliente->nombre }}</td>
                                <td>
                                    <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" style="display:inline;">
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
