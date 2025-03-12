@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Editar Servicio</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('servicios.update', $servicio->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-md-3">
                        <label for="nombre">Nombre del Servicio</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $servicio->nombre }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </section>
@endsection
