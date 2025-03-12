@extends('welcome')

@section('contenido')
<div class="inicio-container">
    <section class="content">
        <div class="box">
            <div class="box-body">
                
             <!--
    Sección de Servicios:
    - Muestra tarjetas con información de cada servicio.
    - Cada tarjeta tiene un botón para agendar citas o visitar la tienda.
  -->
  <section class="container my-5">
    <h2 class="text-center mb-4">Nuestros Servicios</h2>
    <div class="row">
      <!-- Servicio 1: Consultas Médicas -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="public/img/Servicios/2.jpg" class="card-img-top" alt="Consultas Médicas">
          <div class="card-body">
            <h5 class="card-title">Consultas Médicas</h5>
            <p class="card-text">Ofrecemos consultas médicas generales y especializadas para garantizar la salud de tu mascota.</p>
            <a href="agendar_cita.html" class="btn btn-primary">
              <i class="bi bi-calendar-check"></i> Agendar Cita
            </a>
          </div>
        </div>
      </div>

      <!-- Servicio 2: Vacunación -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="public/img/Servicios/3.jpg" class="card-img-top" alt="Vacunación">
          <div class="card-body">
            <h5 class="card-title">Vacunación</h5>
            <p class="card-text">Mantenemos a tu mascota protegida con un esquema completo de vacunación.</p>
            <a href="agendar_cita.html" class="btn btn-primary">
              <i class="bi bi-eyedropper"></i> Agendar Cita
            </a>
          </div>
        </div>
      </div>

      <!-- Servicio 3: Cirugías -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="public/img/Servicios/4.jpg" class="card-img-top" alt="Cirugías">
          <div class="card-body">
            <h5 class="card-title">Cirugías</h5>
            <p class="card-text">Realizamos cirugías con equipos de última generación y un equipo altamente capacitado.</p>
            <a href="agendar_cita.html" class="btn btn-primary">
              <i class="bi bi-scissors"></i> Agendar Cita
            </a>
          </div>
        </div>
      </div>

      <!-- Servicio 4: Peluquería y Estética -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="public/img/Servicios/1.jpg" class="card-img-top" alt="Peluquería y Estética">
          <div class="card-body">
            <h5 class="card-title">Peluquería y Estética</h5>
            <p class="card-text">Mantén a tu mascota siempre hermosa con nuestros servicios de peluquería y estética.</p>
            <a href="agendar_cita.html" class="btn btn-primary">
              <i class="bi bi-scissors"></i> Agendar Cita
            </a>
          </div>
        </div>
      </div>

      <!-- Servicio 5: Atención de Emergencias -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="public/img/Servicios/5.jpg" class="card-img-top" alt="Atención de Emergencias">
          <div class="card-body">
            <h5 class="card-title">Atención de Emergencias</h5>
            <p class="card-text">Estamos disponibles las 24 horas para atender cualquier emergencia de tu mascota.</p>
            <!-- Sin botón -->
          </div>
        </div>
      </div>

      <!-- Servicio 6: Tienda de Mascotas -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="public/img/Servicios/6.jpg" class="card-img-top" alt="Tienda de Mascotas">
          <div class="card-body">
            <h5 class="card-title">Tienda de Mascotas</h5>
            <p class="card-text">Encuentra los mejores productos para el bienestar de tus amigos peludos.</p>
            <a href="tienda.html" class="btn btn-primary">
              <i class="bi bi-cart"></i> Visitar Tienda
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--
    Sección del Blog de Cuidados:
    - Muestra artículos adicionales sobre el cuidado de mascotas.
  -->
  <section id="blog" class="container my-5">
    <h2 class="text-center">Blog de Cuidados</h2>
    <div class="row">
      <!-- Artículo 1 -->
      <div class="col-md-6">
        <div class="card">
          <img src="public/img/Cuidados/1.jpg" class="card-img-top" alt="Cuidados de Perros">
          <div class="card-body">
            <h5 class="card-title">Cuidados Básicos para Perros</h5>
            <p class="card-text">Consejos esenciales para la salud y bienestar de tu mascota.</p>
            <a href="#" class="btn btn-primary">Leer más</a>
          </div>
        </div>
      </div>

      <!-- Artículo 2 -->
      <div class="col-md-6">
        <div class="card">
          <img src="public/img/Cuidados/2.jpg" class="card-img-top" alt="Cuidados de Gatos">
          <div class="card-body">
            <h5 class="card-title">Alimentación Saludable para Gatos</h5>
            <p class="card-text">Descubre cómo proporcionar una dieta equilibrada.</p>
            <a href="#" class="btn btn-primary">Leer más</a>
          </div>
        </div>
      </div>
    </div>
  </section>

            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('public/css/inicio.css') }}">
@endpush

