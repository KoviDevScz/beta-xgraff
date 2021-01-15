<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devolucion extends Model
{
    use SoftDeletes;
    protected $table='devoluciones';
    protected $primaryKey='id';
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_retiro',
        'fecha_devolucion',
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
    */
    protected $casts = [
        'fecha_retiro' => 'datetime:d-m-Y hh:ss',
        'fecha_devolucion' => 'datetime:d-m-Y hh:ss',
    ];
    protected $fillable = [
        'alquiler_id','cliente_id','personal_id', 
        'garantia_devolucion','fecha_alquiler','fecha_devolucion','observacion'
    ];
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
    public function personal()
    {
        return $this->belongsTo('App\Models\Personal');
    }
    public function alquiler()
    {
        return $this->hasOne('App\Models\Alquiler');
    }
}
