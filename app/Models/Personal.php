<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personal extends Model
{
    use SoftDeletes;
    protected $table='personals';
    protected $primaryKey='id';
    protected $fillable = [
       'nombre','ci', 'telf','direccion','foto',
    ];
}
