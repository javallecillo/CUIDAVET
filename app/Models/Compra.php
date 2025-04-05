<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';

    protected $fillable = [
        'proveedor_id',
        'fecha',
        'total',
        'estado', // Asegúrate de que este campo se envíe correctamente desde el controlador
        'id_empleado', // Verifica que este campo también se esté enviando
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado'); // Relación con el modelo Empleado
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'compra_producto')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}