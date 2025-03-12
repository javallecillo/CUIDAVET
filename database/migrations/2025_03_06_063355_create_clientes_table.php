<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('genero');
            $table->string('dni')->unique();
            $table->string('contrasenia');
            $table->string('telefono');
            $table->string('tel_alternativo')->nullable();
            $table->string('correo')->unique();
            $table->string('direccion');
            $table->unsignedBigInteger('id_nacionalidad');
            $table->unsignedBigInteger('id_moneda');
            $table->unsignedBigInteger('id_rol')->default(3);
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
