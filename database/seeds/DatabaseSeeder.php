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
        $this->call(SucursalSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EstadoArticuloSeeder::class);
        $this->call(UnidadMedidaSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(EntradaSeeder::class);
        $this->call(EntradaDetalleSeeder::class);
        $this->call(SalidaSeeder::class);
        $this->call(SalidaDetalleSeeder::class);

    }
}
