<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('cliente_id');
            $table->string('especie'); // Perro, Gato, Ave, etc.
            $table->string('raza')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('sexo', ['Macho', 'Hembra'])->default('Macho');
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
