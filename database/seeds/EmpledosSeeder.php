<?php

use App\Models\Empleados;
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
        factory(Empleados::class)->times(11)->create();
    }
}
