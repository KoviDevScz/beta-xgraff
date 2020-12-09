<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Alquiler_Maquinaria_Cliente extends Model
{
    protected $table='detalle_alquiler_maquinaria_cliente';
    protected $primaryKey='id';
    protected $fillable = [
        'alquiler_id','maquinaria_id', 'cantidad','monto'
    ];
    public function maquinarias()
    {
        return $this->hasMany('App\Models\Maquinaria');
    }
    public function alquiler()
    {
        return $this->belongsTo('App\Models\Alquiler');
    }
}
