<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(UsersSeeder::class);
       $this->call(CategoriaSeeder::class);
       $this->call(ProductoSeeder::class);
       $this->call(PersonalSeeder::class);
       $this->call(EmpledosSeeder::class);
    }
}
