<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores'; // Especifica el nombre correcto de la tabla

    protected $fillable = [
        'nombre',
        'telefono',
        'tel_alternativo',
        'tipo_proveedor',
        'cuenta_banco',
        'banco',
        'forma_pago',
        'correo',
        'direccion',
        'id_moneda',
        'estado',
    ];

    public function moneda()
    {
        return $this->belongsTo(Moneda::class, 'id_moneda');
    }
}
