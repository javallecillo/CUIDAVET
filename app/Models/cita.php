<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'mascota_id',
        'veterinario_id',
        'fecha',
        'hora',
        'estado',
        'observaciones',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function veterinario()
    {
        return $this->belongsTo(Empleado::class, 'veterinario_id');
    }

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}