@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Editar Departamento</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('departamentos.update', $departamento->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-md-3">
                        <label for="nombre">Nombre del Departamento</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $departamento->nombre }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </section>
@endsection
