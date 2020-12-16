<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Personal;
use Faker\Generator as Faker;

$this->nombre=[
    'Carlos',
    'Susana',
    'Felipe',
    'Moise',
    'Andrea',
    'Stephanie',
    'Lynn',
    'Alberto',
    'Cristian',
    'juan Carlos'
];

$this->ci=['15896', '65893','35789', '46327', '6523', '29879', '78965', '38974', '96325', '56879'];
$this->telf=['76895324', '68953217', '76985344', '74000562', '76000790', '60104598', '69008795', '61000459', '75698235', '60458700'];
$this->direccion=[
    'Central Park',
    'Tercer Anillo 3 paso al frente',
    'Km 6 Doble via La Guardia',
    'Cuarto Anillo paragua',
    'Tercer Anillo calle Las Águilas',
    'Avenida Radial 25',
    'Avenida La Salle calle Landivar',
    'Cuarto Anillo Calle K',
    'Avenida Hernando Sanabria',
    'Avenida Juan Pablo II Calle 2'
];

$this->indice_personal=0;
$factory->define(Personal::class, function(Faker $faker){
    $i = $this->indice_personal++;
    return[
        'nombre'=>$this->nombre[$i],
        'ci'=>$this->ci[$i],
        'telf'=>$this->telf[$i],
        'direccion'=>$this->direccion[$i],
    ];
});