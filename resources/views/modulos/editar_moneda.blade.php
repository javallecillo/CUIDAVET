@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Editar Moneda</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('monedas.update', $moneda->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-md-3">
                        <label for="nombre">Nombre de la Moneda</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $moneda->nombre }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="simbolo">Símbolo de la Moneda</label>
                        <input type="text" class="form-control" id="simbolo" name="simbolo" value="{{ $moneda->simbolo }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </section>
@endsection
