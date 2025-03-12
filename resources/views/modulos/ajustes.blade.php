@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Ajustes</h1>
    </section>
    <section class="content table-responsive">
        <div class="box">
            <div class="box-body table-responsive">
                
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
                                    <br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-danger">
                            No se encontraron ajustes.
                        </div>
                    @endif
                <hr>
                    <!-- Sección para Monedas -->
                    <div class="section">
                        <h2>Monedas</h2>
                        <form action="{{ route('monedas.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la moneda" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="simbolo" placeholder="Símbolo de la moneda" required>
                                </div>
                                <div class="col-md-4 text-right">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Agregar Moneda</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <table class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Símbolo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($monedas) && count($monedas) > 0)
                                    @foreach($monedas as $moneda)
                                        <tr>
                                            <td>{{ $moneda->nombre }}</td>
                                            <td>{{ $moneda->simbolo }}</td>
                                            <td>
                                                <form action="{{ route('monedas.destroy', $moneda->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                                <a href="{{ route('monedas.edit', $moneda->id) }}" class="btn btn-warning">Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">No se encontraron monedas.</td>
                                    </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                <hr>
                    <!-- Sección para Roles -->
                    <div class="section">
                        <h2>Roles</h2>
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del rol" required>
                                </div>
                                <div class="col-md-4 text-right">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Agregar Rol</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <table class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($roles) && count($roles) > 0)
                                    @foreach($roles as $rol)
                                        <tr>
                                            <td>{{ $rol->nombre }}</td>
                                            <td>
                                                <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                                <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning">Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No se encontraron roles.</td>
                                    </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                <hr>
                    <!-- Sección para Departamentos -->
                    <div class="section">
                        <h2>Departamentos</h2>
                        <form action="{{ route('departamentos.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del departamento" required>
                                </div>
                                <div class="col-md-4 text-right">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Agregar Departamento</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <table class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($departamentos) && count($departamentos) > 0)
                                    @foreach($departamentos as $departamento)
                                        <tr>
                                            <td>{{ $departamento->nombre }}</td>
                                            <td>
                                                <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                                <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-warning">Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No se encontraron departamentos.</td>
                                    </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>

                    <hr>
                    <!-- Sección para Nacionalidades -->
                    <div class="section">
                        <h2>Nacionalidades</h2>
                        <form action="{{ route('nacionalidades.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la nacionalidad" required>
                                </div>
                                <div class="col-md-4 text-right">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Agregar Nacionalidad</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <table class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($nacionalidades) && count($nacionalidades) > 0)
                                    @foreach($nacionalidades as $nacionalidad)
                                        <tr>
                                            <td>{{ $nacionalidad->nombre }}</td>
                                            <td>
                                                <form action="{{ route('nacionalidades.destroy', $nacionalidad->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                                <a href="{{ route('nacionalidades.edit', $nacionalidad->id) }}" class="btn btn-warning">Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No se encontraron nacionalidades.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                <hr>
                    <!-- Sección para Servicios -->
                    <div class="section">
                        <h2>Servicios</h2>
                        <form action="{{ route('servicios.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del servicio" required>
                                </div>
                                <div class="col-md-4 text-right">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Agregar Servicio</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <table class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($servicios) && count($servicios) > 0)
                                    @foreach($servicios as $servicio)
                                        <tr>
                                            <td>{{ $servicio->nombre }}</td>
                                            <td>
                                                <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                                <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-warning">Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No se encontraron servicios.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </section>
@endsection