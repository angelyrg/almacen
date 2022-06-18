<?php

use App\Salida;
use Illuminate\Database\Seeder;

class SalidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Salida::class, 5)->create();
    }
}
