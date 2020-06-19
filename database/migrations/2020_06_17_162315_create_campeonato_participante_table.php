<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonatoParticipanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonato_participante', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("campeonato_id")->unsigned();
            $table->integer("participante_id")->unsigned();
            $table->integer("escuderia_id")->unsigned()->default(0);
            $table->integer("piloto_id")->unsigned()->default(0);
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
        Schema::dropIfExists('campeonato_participante');
    }
}