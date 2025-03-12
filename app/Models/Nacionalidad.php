<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    protected $table = 'nacionalidades'; // Especificar el nombre correcto de la tabla
}
