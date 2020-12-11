<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
$this->nombre=  ['Membresia FORONE','Pack Inteligente','Pack Formula 1','Formula 1 (und)','Aloe de Manzana','Aloe de Frutilla','Aloe de Mango','Aloe Original'
                ,'Fórmula 1 5 Litros','Pulpa Concentrada','FIBRAFOR','Inmun-e Plus','Mega Combo Premium','ADMINISTRACIÓN','Colágeno Hidrolizado'];
$this->precio=  ['250','1200','1200','100','90','90','90','90','500','699','300','150','4620','2','300'];
$this->cate_pro=['1','4','4','2','2','2','2','2','2','3','3','2','4','1','3'];
$this->pp=      ['125', '600','600','50','45','45','45','45','250','349','150','75','2310','1','150'];
$this->pb=      ['1','240','204','17','12','12','12','12','85','92','71','27','1559','751','73'];
$factory->define(Model::class, function (Faker $faker) {
    $i = $this->indice_producto++;
    return [
            'nombre'=>$this->nombre[$i],
            'categoria_id'=>$this->cate_pro[$i],
            'fecha_compra',
            'precio'=>$this->precio[$i],
            'garantia'=>$this->precio[$i],
            'hora'=>$this->pb[$i],
            'semana'=>$this->pp[$i],
            'mes'=>$this->pp[$i],
    ];
});
