@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Perfil</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-3">
                        <h2>Foto</h2>
                        <img src="{{ asset('dist/img/defecto.png') }}" width="150px" alt="Imagen por defecto">
                    </div>

                    <div class="col-md-3">
                        <h2>Nombre</h2>
                        <input type="text" class="form-control" name="nombre" required value="{{ auth()->user()->nombre }}" readonly>
                    </div>

                    <div class="col-md-3">
                        <h2>Apellido</h2>
                        <input type="text" class="form-control" name="apellido" required value="{{ auth()->user()->apellido }}" readonly>
                    </div>

                    <div class="col-md-3">
                        <h2>Teléfono</h2>
                        <input type="text" class="form-control" name="telefono" required
                        data-inputmask="'mask': '+(999) 9999-9999'" data-mask value="{{ auth()->user()->telefono }}" readonly>
                    </div>

                    <div class="col-md-3">
                        <h2>Correo</h2>
                        <input type="email" class="form-control" name="email" required value="{{ auth()->user()->correo }}" readonly>
                    </div>

                    <div class="col-md-3">
                        <h2>Contraseña</h2>
                        <input type="password" class="form-control" name="password" value="****" readonly>
                    </div>

                    <div class="col-md-12 text-right">
                        <br>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection