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
            $table->text('nombre');
            $table->integer('coches')->default(6);
            $table->integer('vueltas')->default(12);
            $table->integer('carreras')->default(6);
            $table->boolean('pilotos')->default(false);
            $table->boolean('escuderias')->default(false);
            $table->text('descripcion');
            $table->integer("tipo")->unsigned();
            $table->integer('escuderia1')->default(0);
            $table->integer('escuderia2')->default(0);
            $table->integer('escuderia3')->default(0);
            $table->boolean('visible')->default(true);
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