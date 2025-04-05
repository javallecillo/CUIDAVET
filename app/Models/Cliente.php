<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'genero',
        'dni',
        'telefono',
        'tel_alternativo',
        'correo',
        'direccion',
        'id_nacionalidad',
        'id_moneda',
        'estado',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id_nacionalidad' => 'integer',
        'id_moneda' => 'integer',
        'id_rol' => 'integer',
    ];

    public function mascotas()
    {
        return $this->hasMany(Mascota::class, 'cliente_id'); // Asegúrate de que 'cliente_id' sea la clave foránea en la tabla 'mascotas'
    }
}
