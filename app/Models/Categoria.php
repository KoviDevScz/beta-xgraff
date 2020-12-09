<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
    protected $table='categorias';
    protected $primaryKey='id';
    protected $fillable = [
        'nombre', 'descripcion'
    ];
    public function productos()
    {
        return $this->hasMany('App\Models\Maquinaria');
    }
}
