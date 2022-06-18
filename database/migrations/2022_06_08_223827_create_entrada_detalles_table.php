<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("cantidad");

            $table->integer("entrada_id")->unsigned();
            $table->foreign("entrada_id")->references("id")->on("entradas");

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
        Schema::dropIfExists('entrada_detalles');
    }
}
