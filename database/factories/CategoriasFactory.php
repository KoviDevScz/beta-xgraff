<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Categoria;
use Faker\Generator as Faker;

$this->categorias=[ 'MINICARGADOR CON ACCESORIOS',
                    'MINI EXCAVADORA',
                    'TRACTOR',
                    'MONTACARGA',
                    'ELEVADORES DE PERSONA',
                    'GENERADORES',
                    'COMPACTADOR MANUAL',
                    'HERRAMIENTAS CHICAS'];
$this->indice_categoria=0;
$factory->define(Categoria::class, function (Faker $faker) {
    $i = $this->indice_categoria++;
    return [
        'nombre'=>$this->categorias[$i],
        'descripcion'=>$this->categorias[$i],
    ];
});
