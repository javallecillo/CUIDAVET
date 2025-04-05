@extends('welcome')

@section('contenido')
<div class="inicio-container" style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <section class="content" style="padding: 20px;">
        <div class="box" style="background-color:#5493b8; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px;">
            <div class="box-body">
            <!-- Breve presentación del sistema -->
            <div class="presentation" style="text-align: center; margin-bottom: 30px; padding: 40px; border-radius: 10px; background-color: rgba(255, 255, 255, 0.8);">
                <h1 class="title" style="font-size: 36px; font-weight: bold; color: #2c3e50; margin-bottom: 10px;">Bienvenido a Cuidavet</h1>
                <p class="description" style="font-size: 18px; color: #555;">Cuidavet es un sistema diseñado para gestionar los servicios de una veterinaria de manera eficiente. Nuestro objetivo es brindar la mejor atención para tus mascotas.</p>
            </div>
            <!-- Encabezado de servicios -->
            <div class="services-header" style="text-align: center; margin-bottom: 30px;">
                <h2 style="font-size: 32px; font-weight: bold; color: #fff; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">Nuestros Servicios</h2>
                <p style="font-size: 18px; color: #e0f7fa;">Descubre todo lo que ofrecemos para el cuidado de tus mascotas.</p>
            </div>
            <!-- Cards de servicios -->
            <div class="service-cards" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
                <div class="card" style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; width: calc(33.333% - 20px); box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); text-align: center; background-color: rgba(255, 255, 255, 0.8);">
                <h3 class="card-title" style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">Consultas veterinarias</h3>
                <p class="card-description" style="font-size: 14px; color: #555;">Atención personalizada para el diagnóstico y tratamiento de tus mascotas.</p>
                </div>
                <div class="card" style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; width: calc(33.333% - 20px); box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); text-align: center; background-color: rgba(255, 255, 255, 0.8);">
                <h3 class="card-title" style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">Vacunación</h3>
                <p class="card-description" style="font-size: 14px; color: #555;">Protege a tus mascotas con nuestro servicio de vacunación.</p>
                </div>
                <div class="card" style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; width: calc(33.333% - 20px); box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); text-align: center; background-color: rgba(255, 255, 255, 0.8);">
                <h3 class="card-title" style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">Cirugías</h3>
                <p class="card-description" style="font-size: 14px; color: #555;">Realizamos procedimientos quirúrgicos con los más altos estándares.</p>
                </div>
                <div class="card" style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; width: calc(33.333% - 20px); box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); text-align: center; background-color: rgba(255, 255, 255, 0.8);">
                <h3 class="card-title" style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">Estética y cuidado</h3>
                <p class="card-description" style="font-size: 14px; color: #555;">Servicios de peluquería y cuidado para mantener a tus mascotas felices.</p>
                </div>
                <div class="card" style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; width: calc(33.333% - 20px); box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); text-align: center; background-color: rgba(255, 255, 255, 0.8);">
                <h3 class="card-title" style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">Venta de productos</h3>
                <p class="card-description" style="font-size: 14px; color: #555;">Encuentra alimentos y accesorios de calidad para tus mascotas.</p>
                </div>
            </div>
            <!-- Información adicional sin tarjeta -->
            <div class="information" style="margin-top: 10px; text-align: center; padding: 20px;">
                <h2 class="subtitle" style="font-size: 28px; font-weight: bold; color: #fff; margin-bottom: 15px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">Información</h2>
                <p class="info-text" style="font-size: 16px; color: #e0f7fa; line-height: 1.8;">Contamos con un equipo de profesionales altamente capacitados y con instalaciones modernas para garantizar el bienestar de tus mascotas.</p>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection
