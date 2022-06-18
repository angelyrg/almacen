<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(EstadoArticulo::class, 6)->create();

        $estados = ['Nuevo', 'Operativo', 'En funcionamiento', 'Malogrado', 'Dado de baja', 'Roto'];

        foreach($estados as $estado){

            DB::table('estado_articulos')->insert([
                'nombre' => $estado
            ]);
        }


    }
}
