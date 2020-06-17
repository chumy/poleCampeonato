<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonatoCarreraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonato_carrera', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("orden")->default(1);
            $table->integer("campeonato_id")->unsigned();
            $table->integer("carrera_id")->unsigned();
            $table->integer("punto_id")->unsigned()->default(0);
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
        Schema::dropIfExists('campeonato_carrera');
    }
}