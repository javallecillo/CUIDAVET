<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Empleado extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'tel_alternativo',
        'direccion',
        'correo',
        'contrasenia',
        'id_rol',
        'f_nacimiento',
        'genero',
        'foto',
        'f_contratacion',
        'id_departamento',
        'dias_laborales',
        'turno',
        'salario',
        'id_moneda',
        'estado',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'contrasenia',
    ];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->contrasenia;
    }

    /**
     * Get the username for the user.
     *
     * @return string
     */
    public function username()
    {
        return 'correo';
    }

    /*
    // Relación con la tabla roles
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    // Relación con la tabla departamentos
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }

    // Relación con la tabla monedas
    public function moneda()
    {
        return $this->belongsTo(Moneda::class, 'id_moneda');
    }*/
}
