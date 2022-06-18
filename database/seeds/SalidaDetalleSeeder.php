<?php

use App\SalidaDetalle;
use Illuminate\Database\Seeder;

class SalidaDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SalidaDetalle::class, 50)->create();

    }
}
