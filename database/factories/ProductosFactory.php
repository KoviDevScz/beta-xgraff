<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Maquinaria;
use Faker\Generator as Faker;

$this->nombre=  [   'MINI CARGADOR BOB CAT CON PALA',
                    'MINI CARGADOR CON HORQUILLAS TIPO MONTACARGA',
                    'MINI EXCAVADORA BOB CAT 322G',
                    'TRACTOR KUBOTA L4310 CON DESBROZADORA',
                    'MONTACARGA DAEWOO GC25E ',
                    'ELEVADORES DE PERSONAL TIPO TIJERA 7.5 MTS',
                    'GENERADOR COLEMAN 20KVA DIESEL',
                    'COMPRESOR DE AIRE TRIFASICO',
                    'COMPACTADOR',
                    'PLATO VIBRATORIO',
                    'MOTOSIERRA A GASOLINA'];
$this->precio=  ['2274','2234','2634','2715','1792','1984','7017','9492','3742','2712','1582'];
$this->garantia=  ['682','682','682','682','536','536','2105','9492','1122','813','476'];
$this->cate_pro=['1','1','1','2','3','3','4','5','6','7','8'];
$this->pg=      ['13250','13250','13250','15200','9850','7500','4200','2780','1458','1210','650'];
$this->ph=      ['195', '195','195','234','159','175','232','231','53','61','251'];
$this->ps=      ['5250','5250','5250','6350','4170','4500','2070','2800','1104','800','600'];
$this->pm=      ['19800','19800','19800','24057','16800','6210','8400','20280','3312','2400','1400'];
$this->indice_producto=0;
$factory->define(Maquinaria::class, function (Faker $faker) {
    $i = $this->indice_producto++;
    return [
            'nombre'=>$this->nombre[$i],
            'categoria_id'=>$this->cate_pro[$i],
            'fecha_compra'=>$faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
            'precio'=>$this->precio[$i],
            'garantia'=>$this->garantia[$i],
            'hora'=>$this->ph[$i],
            'semana'=>$this->ps[$i],
            'mes'=>$this->pm[$i],
    ];
});
