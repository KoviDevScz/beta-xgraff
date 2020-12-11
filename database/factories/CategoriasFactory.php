<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$this->categorias=['Maquinaria Pesada','Maquinaria Ligera','Maquinaria Itermedia','Herramientas Pesadas','Herramientas Ligeras','Herramientas Itermedias'];
$this->indice_categoria=0;
$factory->define(Model::class, function (Faker $faker) {
    $i = $this->indice_categoria++;
    return [
        'nombre'=>$this->categorias[$i],
        'descripcion'=>"demostracion",
    ];
});
