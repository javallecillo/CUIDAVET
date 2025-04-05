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

                        <div class="mb-2 row">
                            
                            <!-- Formulario para agregar roles -->
                            <div class="col-md-6">

                                <h4>Agregar rol</h4>

                                <form action="{{ url()->current() }}" method="POST" class="d-flex align-items-center gap-2">
                                    @csrf
                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Agregar rol" required>
                                        <br>
                                    </div>
                                
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
                                    </div>
                                </form>
                                <br>
                            </div>

                            <!-- Formulario para buscar roles -->
                            <div class="col-md-6">
                                <h4>Buscar rol</h4>
                                <form action="{{ route('roles.index') }}" method="GET" class="d-flex align-items-center gap-2">
                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar..." value="{{ request('search') }}">
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
                                    <th style="color: white; background-color: #0d98ba;">#</th>
                                    <th style="color: white; background-color: #0d98ba;">Nombre</th>
                                    <th style="color: white; background-color: #0d98ba;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($roles) && count($roles) > 0)
                                    @foreach($roles as $rol)
                                        <tr>
                                            <td>{{ $loop->iteration + $roles->firstItem() - 1 }}</td>
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
                                        <td colspan="8" class="text-center">No se encontraron roles.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $roles->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                @elseif(request()->is('monedas'))
                    <!-- Sección de monedas -->
                    <div class="section">

                        <div class="mb-2 row">
                            <!-- Formulario para agregar monedas -->
                            <div class="col-md-5">

                                <h4>Agregar Moneda</h4>
                                
                                <form action="{{ url()->current() }}" method="POST" class="d-flex align-items-center gap-2">
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
                                    <th style="color: white; background-color: #0d98ba;">#</th>
                                    <th style="color: white; background-color: #0d98ba;">Nombre</th>
                                    <th style="color: white; background-color: #0d98ba;">Símbolo</th>
                                    <th style="color: white; background-color: #0d98ba;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($monedas) && count($monedas) > 0)
                                    @foreach($monedas as $moneda)
                                        <tr>
                                            <td>{{ $loop->iteration + $monedas->firstItem() - 1 }}</td>
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
                                        <td colspan="8" class="text-center">No se encontraron monedas.</td>
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

                        <div class="mb-2 row">
                            
                            <!-- Formulario para agregar departamento -->
                            <div class="col-md-6">

                                <h4>Agregar departamento</h4>

                                <form action="{{ url()->current() }}" method="POST" class="d-flex align-items-center gap-2">
                                    @csrf
                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Agregar departamento" required>
                                        <br>
                                    </div>
                                
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
                                    </div>
                                </form>
                                <br>
                            </div>

                            <!-- Formulario para buscar departamentos -->
                            <div class="col-md-6">
                                <h4>Buscar departamento</h4>
                                <form action="{{ route('departamentos.index') }}" method="GET" class="d-flex align-items-center gap-2">
                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar..." value="{{ request('search') }}">
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
                                    <th style="color: white; background-color: #0d98ba;">#</th>
                                    <th style="color: white; background-color: #0d98ba;">Nombre</th>
                                    <th style="color: white; background-color: #0d98ba;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($departamentos) && count($departamentos) > 0)
                                    @foreach($departamentos as $departamento)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td> <!-- Cambiar a $loop->iteration si no hay paginación -->
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
                                        <td colspan="8" class="text-center"></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $departamentos->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                @elseif(request()->is('nacionalidades'))
                    <!-- Sección de nacionalidades -->
                    <div class="section">
                        
                        <div class="mb-2 row">
                            
                            <!-- Formulario para agregar nacionalidades -->
                            <div class="col-md-6">

                                <h4>Agregar nacionalidad</h4>

                                <form action="{{ url()->current() }}" method="POST" class="d-flex align-items-center gap-2">
                                    @csrf
                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Agregar nacionalidad" required>
                                        <br>
                                    </div>
                                
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
                                    </div>
                                </form>
                                <br>
                            </div>

                            <!-- Formulario para buscar nacionalidades -->
                            <div class="col-md-6">
                                <h4>Buscar nacionalidad</h4>
                                <form action="{{ route('nacionalidades.index') }}" method="GET" class="d-flex align-items-center gap-2">
                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                        <br>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                        
                        <br>
                        <table class="table table-bordered table-striped table-sm mt-2">
                            <thead>
                                <tr>
                                    <th style="color: white; background-color: #0d98ba;">#</th>
                                    <th style="color: white; background-color: #0d98ba;">Nombre</th>
                                    <th style="color: white; background-color: #0d98ba;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($nacionalidades) && $nacionalidades->count() > 0)
                                    @foreach($nacionalidades as $nacionalidad)
                                        <tr>
                                            <td>{{ $loop->iteration + $nacionalidades->firstItem() - 1 }}</td>
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
                                        <td colspan="8" class="text-center">No se encontraron nacionalidades.</td>
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

                        <div class="mb-2 row">
                            
                            <!-- Formulario para agregar servicio -->
                            <div class="col-md-6">

                                <h4>Agregar servicio</h4>

                                <form action="{{ url()->current() }}" method="POST" class="d-flex align-items-center gap-2">
                                    @csrf
                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Agregar servicio" required>
                                        <br>
                                    </div>
                                
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
                                    </div>
                                </form>
                                <br>
                            </div>

                            <!-- Formulario para buscar servicios -->
                            <div class="col-md-6">
                                <h4>Buscar servicio</h4>
                                <form action="{{ route('servicios.index') }}" method="GET" class="d-flex align-items-center gap-2">
                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar..." value="{{ request('search') }}">
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
                                    <th style="color: white; background-color: #0d98ba;">#</th>
                                    <th style="color: white; background-color: #0d98ba;">Nombre</th>
                                    <th style="color: white; background-color: #0d98ba;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($servicios) && count($servicios) > 0)
                                    @foreach($servicios as $servicio)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
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
                                        <td colspan="8" class="text-center">No se encontraron servicios.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <div class="text-center">
                            {{ $servicios->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>

                    </div>


                    @elseif(request()->is('especialidades'))

                    <!-- Sección de especialidades -->
                    <div class="section">

                        <div class="mb-2 row">
                            
                            <!-- Formulario para agregar especialidades -->
                            <div class="col-md-6">

                                <h4>Agregar especialidad</h4>

                                <form action="{{ url()->current() }}" method="POST" class="d-flex align-items-center gap-2">
                                    @csrf
                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Agregar especialidad" required>
                                        <br>
                                    </div>
                                
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
                                    </div>
                                </form>
                                <br>
                            </div>

                            <!-- Formulario para buscar especialidades -->
                            <div class="col-md-6">
                                <h4>Buscar especialidad</h4>
                                <form action="{{ route('especialidades.index') }}" method="GET" class="d-flex align-items-center gap-2">
                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar..." value="{{ request('search') }}">
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


                    <div class="section">
                        <table class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th style="color: white; background-color: #0d98ba;">#</th>
                                    <th style="color: white; background-color: #0d98ba;">Nombre</th>
                                    <th style="color: white; background-color: #0d98ba;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($especialidades) && count($especialidades) > 0)
                                    @foreach($especialidades as $especialidad)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
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
                                        <td colspan="8" class="text-center">No se encontraron especialidades.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $especialidades->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </section>
@endsection