<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$this->correo_usuario=['Admin','Cajera'];
$this->indice_rolusu=0;
$factory->define(User::class, function (Faker $faker) {
    $i=$this->indice_rolusu++;
    return [
        'name' => $faker->name,
        'email' => $this->correo_usuario[$i]."@gmail.com",
        'email_verified_at' => now(),
        'password' =>  bcrypt('123456789'), // password
        'remember_token' => Str::random(10),
    ];
});
