@extends('welcome')

@section('contenido')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>Ajustes</h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if(auth()->user()->id_rol == 1)
                    @if(isset($ajustes))
                        <form action="{{ route('ajustes.update', $ajustes->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-3">
                                    <h2>Foto</h2>
                                    <input type="file" class="form-control" name="logo">
                                    @if($ajustes->logo)
                                        <img src="{{ asset('storage/' . $ajustes->logo) }}" width="150px" alt="Imagen actual">
                                    @else
                                        <img src="{{ asset('dist/img/logo.png') }}" width="150px" alt="Imagen por defecto">
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <h2>Telefono</h2>
                                    <input type="text" class="form-control" name="telefono" required
                                    data-inputmask="'mask': '+(999) 9999-9999'" data-mask value="{{$ajustes->telefono}}">
                                </div>

                                <div class="col-md-3">
                                    <h2>Direccion</h2>
                                    <input type="text" class="form-control" name="direccion" required value="{{$ajustes->direccion}}">
                                </div>

                                <div class="col-md-3">
                                    <h2>Moneda</h2>
                                    <select class="form-control" name="id_moneda" required>
                                        @foreach($monedas as $moneda)
                                            <option value="{{ $moneda->id }}" {{ $ajustes->id_moneda == $moneda->id ? 'selected' : '' }}>
                                                {{ $moneda->nombre }} ({{ $moneda->simbolo }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <h2>Zona Horaria</h2>
                                    <select class="form-control" name="zona_horaria" required>
                                        <option value="UTC-06:00" {{$ajustes->zona_horaria == 'UTC-06:00' ? 'selected' : ''}}>UTC-06:00 - Central America</option>
                                        <option value="UTC-05:00" {{$ajustes->zona_horaria == 'UTC-05:00' ? 'selected' : ''}}>UTC-05:00 - Eastern Time (US & Canada), Bogota</option>
                                        <option value="UTC-03:00" {{$ajustes->zona_horaria == 'UTC-03:00' ? 'selected' : ''}}>UTC-03:00 - Buenos Aires, Greenland</option>
                                        <option value="UTC+00:00" {{$ajustes->zona_horaria == 'UTC+00:00' ? 'selected' : ''}}>UTC+00:00 - London, Lisbon</option>
                                        <option value="UTC+01:00" {{$ajustes->zona_horaria == 'UTC+01:00' ? 'selected' : ''}}>UTC+01:00 - Berlin, Lagos</option>
                                        <option value="UTC+08:00" {{$ajustes->zona_horaria == 'UTC+08:00' ? 'selected' : ''}}>UTC+08:00 - Beijing, Singapore</option>
                                    </select>
                                </div>

                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-danger">
                            No se encontraron ajustes.
                        </div>
                    @endif
                @endif
                </div>
            </div>
        </section>

    </div>
    
@endsection