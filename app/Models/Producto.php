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


    public function compras()
    {
        return $this->belongsToMany(Compra::class, 'compra_producto')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'producto_venta')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}
