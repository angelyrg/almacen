<?php

use App\EntradaDetalle;
use Illuminate\Database\Seeder;

class EntradaDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EntradaDetalle::class, 50)->create();
    }
}
