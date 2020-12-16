<?php

use App\Models\Empleados;
use App\Models\Personal;
use Illuminate\Database\Seeder;

class EmpledosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Personal::class)->times(4)->create();
    }
}
