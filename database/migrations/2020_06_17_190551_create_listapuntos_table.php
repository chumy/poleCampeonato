<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaPuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listapuntos', function (Blueprint $table) {
            //

            $table->bigIncrements('id');
            $table->integer('posicion')->default(1);
            $table->integer('puntos')->default(0);
            $table->unsignedBigInteger('punto_id');
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
        Schema::dropIfExists('listapuntos');
    }
}