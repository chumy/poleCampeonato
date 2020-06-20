<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraParticipanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera_participante', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("posicion")->default(6);
            $table->boolean('abandono')->default(false);
            $table->boolean('participacion')->default(false);
            $table->integer("campeonato_id")->unsigned();
            $table->integer("carrera_id")->unsigned();
            $table->integer("participante_id")->unsigned();
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
        Schema::dropIfExists('carrera_participante');
    }
}