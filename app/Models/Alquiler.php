<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alquiler extends Model
{
    use SoftDeletes;
    protected $table='alquileres';
    protected $primaryKey='id';
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_alquiler',
        'fecha_devolucion',
    ];

    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
    */
    protected $casts = [
        'fecha_alquiler' => 'datetime:d-m-Y hh:ss',
        'fecha_devolucion' => 'datetime:d-m-Y hh:ss',
    ];
    protected $fillable = [
        'cliente_id','personal_id', 
        'monto_total', 'garantia',
        'fecha_alquiler','fecha_devolucion'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
    public function personal()
    {
        return $this->belongsTo('App\Models\Personal');
    }
}
