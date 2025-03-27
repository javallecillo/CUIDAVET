<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'idcategoria',
        'codigo',
        'cantidad',
        'imagen',
        'descripcion',
        'precio_compra',
        'precio_venta',
        'estado',
    ];
}
