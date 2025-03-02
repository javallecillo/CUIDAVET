<?php
// filepath: /c:/laragon/www/cuidavet/app/Models/Moneda.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla si es diferente del nombre del modelo en plural
    protected $table = 'monedas';

    // Especifica los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'simbolo',
    ];
}