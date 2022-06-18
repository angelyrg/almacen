<?php

use App\Entrada;
use Illuminate\Database\Seeder;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Entrada::class, 5)->create();
    }
}
