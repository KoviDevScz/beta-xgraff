<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleados extends Model
{
    use SoftDeletes;
    
    protected $table='empleados';
    protected $primaryKey='id';
    
    protected $fillable = [
        'nombre','ci', 
        'telf', 'direccion'
    ];
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function detalle_alquiler()
    {
        return $this->hasMany('App\Models\Detalle_Alquiler_Maquinaria_Cliente');
    }
}
