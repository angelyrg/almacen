<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("codigo", 10)->unique();
            $table->string("nombre", 30);
            $table->string("descripcion");
            $table->integer("stock");

            $table->integer("estado_id")->unsigned();
            $table->foreign("estado_id")->references("id")->on("estado_articulos");

            $table->integer("medida_id")->unsigned();
            $table->foreign("medida_id")->references("id")->on("unidad_medidas");

            $table->integer("usuario_id")->unsigned();
            $table->foreign("usuario_id")->references("id")->on("users");
            

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
        Schema::dropIfExists('articulos');
    }
}
