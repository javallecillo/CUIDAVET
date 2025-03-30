@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Ajustes</h1>
    </section>
    <section class="content table-responsive">
        <div class="box">
            <div class="box-body table-responsive">
                <!-- Navbar -->
                <ul class="nav nav-tabs">
                    <li class="{{ request()->is('ajustes') ? 'active' : '' }}">
                        <a href="{{ route('ajustes.index') }}">Ajustes</a>
                    </li>
                    <li class="{{ request()->is('roles') ? 'active' : '' }}">
                        <a href="{{ route('roles.index') }}">Roles</a>
                    </li>
                    <li class="{{ request()->is('monedas') ? 'active' : '' }}">
                        <a href="{{ route('monedas.index') }}">Monedas</a>
                    </li>
                    <li class="{{ request()->is('departamentos') ? 'active' : '' }}">
                        <a href="{{ route('departamentos.index') }}">Departamentos</a>
                    </li>
                    <li class="{{ request()->is('nacionalidades') ? 'active' : '' }}">
                        <a href="{{ route('nacionalidades.index') }}">Nacionalidades</a>
                    </li>
                    <li class="{{ request()->is('servicios') ? 'active' : '' }}">
                        <a href="{{ route('servicios.index') }}">Servicios</a>
                    </li>
                    <li class="{{ request()->is('especialidades') ? 'active' : '' }}">
                        <a href="{{ route('especialidades.index') }}">Especialidades</a>
                    </li>
                </ul>
                <br>
                <!-- Contenido dinámico -->
                @if(request()->is('ajustes'))
                    <!-- Sección de ajustes -->
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
                        <div class="col-md-3 text-center">
                            <h2>Foto</h2>
                            <input type="file" class="form-control" name="logo">
                            <br>
                            @if($ajustes->logo)
                                <img src="{{ asset('storage/' . $ajustes->logo) }}" width="150px" alt="Imagen actual">
                            @else
                                <img src="{{ asset('dist/img/logo.png') }}" width="150px" alt="Imagen por defecto">
                            @endif
                        </div>


                        <div class="col-md-3">
                            <h2>Teléfono</h2>
                            <input type="text" class="form-control" name="telefono" required
                            data-inputmask="'mask': '+(999) 9999-9999'" data-mask value="{{$ajustes->telefono}}">
                        </div> 

                        <!-- 
                        <div class="col-md-3">
                            <h2>Moneda</h2>
                            <select class="form-control" name="id_moneda" required>
                                @foreach($monedas as $moneda)
                                    <option value="{{ $moneda->id }}" {{ $ajustes->id_moneda == $moneda->id ? 'selected' : '' }}>
                                        {{ $moneda->nombre }} ({{ $moneda->simbolo }})
                                    </option>
                                @endforeach
                            </select>
                        </div>-->

                        <div class="col-md-3">
                            <h2>RTN</h2>
                            <input type="text" class="form-control" name="rtn" required value="{{ $ajustes->rtn }}">
                        </div>

                        <div class="col-md-3">
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

                        <div class="col-md-9">
                            <h2>Dirección</h2>
                            <textarea name="direccion" type="text" class="form-control">{{$ajustes->direccion}}</textarea>
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
                @elseif(request()->is('roles'))
                    <!-- Sección de roles -->
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
                @elseif(request()->is('monedas'))
                    <!-- Sección de monedas -->
                    <div class="section">

                        <div class="mb-2 row">
                            <!-- Formulario para agregar monedas -->
                            <div class="col-md-5">

                                <h4>Agregar Moneda</h4>
                                
                                <form action="{{ route('monedas.store') }}" method="POST" class="d-flex align-items-center gap-2">
                                    @csrf

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la moneda" required autocomplete="off">
                                        <br>                                    
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="simbolo" placeholder="Símbolo" required autocomplete="off">
                                        <br>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
                                        
                                    </div>

                                </form>
                                <br>
                            </div>

                            <!-- Formulario para buscar monedas -->
                            <div class="col-md-6">
                                <h4>Buscar Moneda</h4>
                                <form action="{{ route('monedas.index') }}" method="GET" class="d-flex align-items-center gap-2">
                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar por nombre..." value="{{ request('search') }}" required autocomplete="off">
                                        <br>
                                    </div> 
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

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
                        <div class="text-center">
                            {{ $monedas->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                @elseif(request()->is('departamentos'))
                    <!-- Sección de departamentos -->
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
                @elseif(request()->is('nacionalidades'))
                    <!-- Sección de nacionalidades -->
                    <div class="section">
                        <h2>Nacionalidades</h2>

                        <div class="mb-1 row">
                            <!-- Formulario para agregar nacionalidades -->
                            <form action="{{ route('nacionalidades.store') }}" method="POST" class="d-flex align-items-center gap-2">
                                @csrf
                                
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Agregar nacionalidad" required>
                                </div>
                            
                                <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
                            
                            </form>

                            <!-- Formulario para buscar nacionalidades -->
                            <form action="{{ route('nacionalidades.index') }}" method="GET" class="d-flex align-items-center gap-2">
                                
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                            </form>

                        </div>
                        
                        <br>
                        <table class="table table-bordered table-striped table-sm mt-2">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($nacionalidades) && $nacionalidades->count() > 0)
                                    @foreach($nacionalidades as $nacionalidad)
                                        <tr>
                                            <td>{{ $nacionalidad->nombre }}</td>
                                            <td>
                                                <form action="{{ route('nacionalidades.destroy', $nacionalidad->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                                <a href="{{ route('nacionalidades.edit', $nacionalidad->id) }}" class="btn btn-warning btn-sm">Editar</a>
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
                        <div class="text-center">
                            {{ $nacionalidades->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                @elseif(request()->is('servicios'))
                    <!-- Sección de servicios -->
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
                    @elseif(request()->is('especialidades'))
                    <!-- Sección de especialidades -->
                    <div class="section">
                        <h2>Especialidades</h2>
                        <form action="{{ route('especialidades.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la especialidad" required>
                                </div>
                                <div class="col-md-4 text-right">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Agregar Especialidad</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="section">
                        <table class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($especialidades) && count($especialidades) > 0)
                                    @foreach($especialidades as $especialidad)
                                        <tr>
                                            <td>{{ $especialidad->nombre }}</td>
                                            <td>
                                                <form action="{{ route('especialidades.destroy', $especialidad->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                                <a href="{{ route('especialidades.edit', $especialidad->id) }}" class="btn btn-warning">Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No se encontraron especialidades.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection