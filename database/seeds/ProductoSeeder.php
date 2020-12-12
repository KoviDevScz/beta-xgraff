<?php

use App\Models\Maquinaria;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Maquinaria::class)->times(11)->create();
    }
}
