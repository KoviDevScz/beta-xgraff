<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Empleados;
use App\Models\Personal;
use Faker\Generator as Faker;

$this->nombres=[
    'Yuliana Flores Perez',
    'Andres Suarez Vaca',
    'Jaime Pericles Oropeza',
    'Sheila Vaca Diaz'
];

$this->ci=[
    '486582',
    '896424',
    '8795445',
    '325672'
];

$this->telefonos=[
    '60089746',
    '72698745',
    '72358964',
    '60005625'
];

$this->direcciones=[
    'Km 12 Doble Via La Guardia calle Los Mangos',
    'Avenida Remanzo Calle 1 Oeste',
    'Cuarto Anillo Calle 3',
    'Avenida Cristo Redentor y Aveneida Sexto Anillo'
];
$this->pi=      ['20201020093309.jpeg','20201020093434.jpeg','20201020093544.jpeg','20201020093617.jpeg'];
$this->indice_empleado=0;
$factory->define(Personal::class, function(Faker $faker){
    $i = $this->indice_empleado++;
    return[
        'nombre'=>$this->nombres[$i],
        'ci'=>$this->ci[$i],
        'telf'=>$this->telefonos[$i],
        'direccion'=>$this->direcciones[$i],
        'foto'=>$this->pi[$i],
    ];
});