<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Cliente;
use Faker\Generator as Faker;

$this->nom=[
    'Antonio Flores',
    'José Lopez Zuaco',
    'Manuel Gutierrez Choque',
    'Francisco Roda Lirio',
    'David Suarez Urquizu',
    'Javier',
    'Lucía',
    'Daniela',
    'Daniel',
    'Valeria',
    'Julia',
    'María',
    'Josefa',
    'María Pilar',
    'María Dolores',
    'Belen'
];

$this->ci=[
    '6962120',
    '3037257',
    '9350108',
    '2363705',
    '6532361',
    '4021781',
    '3830778',
    '5376120',
    '4337974',
    '4874715',
    '3557566',
    '5060421',
    '3469800',
    '4984222',
    '9180071',
    '2271225'
];

$this->telf=[
    '79856324',
    '60059790',
    '71000058',
    '60450250',
    '62508796',
    '75980101',
    '75806941',
    '67584100',
    '78595086',
    '76981200',
    '69807810',
    '78269842',
    '78950101',
    '60124780',
    '78541015',
    '74058920'
];

$this->direccion=[
    'Lombard Street',
    'Quinta Avenida',
    'Calle Principal',
    'Calle Linares',
    'Calle La paz',
    'Calle Nicanor Salvatierra',
    'Calle Nueva Rioja',
    'Calle Salatiel Suárez',
    'Avenida Mariscal Santa Cruz',
    'Carretera a Viacha a dos cuadras del cruce a Villa Adela',
    'Zona Pucarani, avenida Arica s/n',
    'Urbanización Cochiraya - Los Pinos',
    'Tiquipaya, zona Chillimarca, calle Caracol S/N',
    'Av. 2 de Agosto Nº 4320, entre calles 6 y 7 barrio 2 de Agosto',
    'Héroes del Chaco, zona Morros Blancos',
    'Av. Sattori Roman Nº 522 barrio San José',
];

$this->indice_cliente=0;
$factory->define(Cliente::class, function(Faker $faker){
    $i = $this->indice_cliente++;
    return [
        'nombre'=>$this->nom[$i],
        'ci'=>$this->ci[$i],
        'telf'=>$this->telf[$i],
        'direccion'=>$this->direccion[$i],
    ];
});