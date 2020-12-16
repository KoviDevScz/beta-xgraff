<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Empleados;
use Faker\Generator as Faker;

$this->nombre=[
    'Yuliana',
    'Andres',
    'Jaime',
    'Sheila'
];

$this->ci=[
    '48658',
    '89642',
    '87954',
    '32567'
];

$this->telf=[
    '60089746',
    '72698745',
    '72358964',
    '60005625'
];

$this->direccion=[
    'Km 12 Doble Via La Guardia calle Los Mangos',
    'Avenida Remanzo Calle 1 Oeste',
    'Cuarto Anillo Calle 3',
    'Avenida Cristo Redentor y Aveneida Sexto Anillo'
];

$this->indice_empleado=0;
$factory->define(Empleados::class, function(Faker $faker){
    $i = $this-> indice_empleado++;
    return[
        'nombre'=>$this->nombre[$i],
        'ci'=>$this->ci[$i],
        'telf'=>$this->telf[$i],
        'direccion'=>$this->direccion[$i],
    ];
});