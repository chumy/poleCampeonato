<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            /*$table->bigIncrements('id');
            $table->text('nombre');
            $table->boolean('visible')->default(true);
            $table->timestamps();*/

            $table->bigIncrements('id');
            $table->integer("orden")->default(1);
            $table->boolean("visible")->default(true);
            $table->date("fecha")->nullable();

            $table->unsignedBigInteger('campeonato_id');
            $table->unsignedBigInteger('circuito_id');
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
        Schema::dropIfExists('carreras');
    }
}