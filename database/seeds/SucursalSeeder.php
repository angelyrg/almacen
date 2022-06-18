<?php

use App\Sucursal;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sucursal::factory(10)->create();
        factory(Sucursal::class, 5)->create();
    }
}
