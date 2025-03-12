<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('tel_alternativo')->nullable();
            $table->string('tipo_proveedor');
            $table->string('cuenta_banco');
            $table->string('banco');
            $table->string('forma_pago');
            $table->string('correo')->unique();
            $table->string('direccion');
            $table->foreignId('id_moneda')->constrained('monedas');
            $table->string('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
