<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("cantidad");

            $table->integer("salida_id")->unsigned();
            $table->foreign("salida_id")->references("id")->on("salidas")->onDelete('cascade');

            $table->integer("articulo_id")->unsigned();
            $table->foreign("articulo_id")->references("id")->on("articulos");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salida_detalles');
    }
}
