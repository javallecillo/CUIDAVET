<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ajustes extends Model
{
    use HasFactory;
    protected $table = 'ajustes';

    protected $fillable = [
        'telefono',
        'direccion',
        'id_moneda',
        'zona_horaria',
        'logo',
    ];

}
