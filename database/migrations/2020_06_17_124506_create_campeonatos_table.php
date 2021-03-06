<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('num_coches')->default(6);
            $table->integer('num_vueltas')->default(12);
            $table->integer('num_carreras')->default(6);
            $table->boolean('pilotos')->default(false);
            $table->boolean('escuderias')->default(false);
            $table->text('descripcion');
            $table->boolean('visible')->default(false);
            $table->string('slug')->unique();

            $table->integer('punto_escuderia_id')->unsigned()->nullable();
            $table->integer("tipo")->unsigned();


            $table->integer("punto_id")->unsigned();

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
        Schema::dropIfExists('campeonatos');
    }
}