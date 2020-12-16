<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleDevolucion extends Model
{
    protected $table='detalle_devolucion_maquinaria';
    protected $primaryKey='id';
    protected $fillable = [
        'alquiler_id','maquinaria_id', 'cantidad'
    ];
    
}
