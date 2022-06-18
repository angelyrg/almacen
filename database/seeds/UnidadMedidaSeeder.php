<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(UnidadMedida::class, 6)->create();
        $medidas = ['Kilogramos', 'Unidades', 'Metros', 'Rollos', 'Docenas', 'Cajas'];

        foreach($medidas as $medida){

            DB::table('unidad_medidas')->insert([
                'nombre' => $medida
            ]);
        }
    }
}
