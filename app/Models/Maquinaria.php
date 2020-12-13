<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maquinaria extends Model
{
    use SoftDeletes;
    protected $table='maquinarias';
    protected $primaryKey='id';
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_compra'
    ];

    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
    */
    protected $casts = [
        'fecha_compra' => 'datetime:Y-m-d',
    ];
    protected $fillable = [
        'nombre','categoria_id', 
        'fecha_compra', 'garantia','precio',
        'hora','semana','mes'
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
