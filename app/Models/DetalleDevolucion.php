<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleDevolucion extends Model
{
    protected $table='detalle_devolucion_maquinaria';
    protected $primaryKey='id';
    protected $fillable = [
        'devolucion_id','maquinaria_id', 'cantidad'
    ];
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
}
