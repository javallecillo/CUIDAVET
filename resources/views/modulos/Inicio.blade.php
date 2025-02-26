@extends('welcome')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Ajustes</h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    @if(auth()->user()->id_rol == 1)
                        <form>
                            <div class="col-md-3">
                                <h2>Logo</h2>
                                <input type="file" class="form-control" name="logo">
                                <br>
                                <img src="{{url('dist\img\defecto.png')}}" width="200px">
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection