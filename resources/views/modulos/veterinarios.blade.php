@extends('welcome')

@section('contenido')
    <section class="content-header">
        <h1>Veterinarios</h1>
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
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="color: white; background-color: #0d98ba;">Nombre</th>
                            <th style="color: white; background-color: #0d98ba;">Apellido</th>
                            <th style="color: white; background-color: #0d98ba;">Teléfono</th>
                            <th style="color: white; background-color: #0d98ba;">Correo</th>
                            <!--<th style="color: white; background-color: #0d98ba;">Especialidad</th>-->
                            <th style="color: white; background-color: #0d98ba;">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($veterinarios as $veterinario)
                        <tr>
                            <td>{{ $veterinario->nombre }}</td>
                            <td>{{ $veterinario->apellido }}</td>
                            <td>{{ $veterinario->telefono }}</td>
                            <td>{{ $veterinario->correo }}</td>
                            <!--<td>{{ $veterinario->especialidad->nombre ?? 'N/A' }}</td>  Mostrar el nombre de la especialidad -->
                            <td>{{ $veterinario->estado }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay veterinarios registrados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
        </div>
    </section>
@endsection
