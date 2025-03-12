@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Editar Rol</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('roles.update', $rol->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-md-3">
                        <label for="nombre">Nombre del Rol</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $rol->nombre }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </section>
@endsection
