<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFkInscrito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscritos', function (Blueprint $table) {
            //
            $table->foreign('campeonato_id')
                ->references('id')->on('campeonatos')
                ->onDelete('cascade');

            /*$table->foreign('escuderia_id')
                ->references('id')->on('escuderias')
                ->onDelete('cascade');

            $table->foreign('piloto_id')
                ->references('id')->on('pilotos')
                ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscritos', function (Blueprint $table) {
            //
            $table->dropForeign('inscritos_campeonato_id_foreign');
            //$table->dropForeign('inscritos_escuderia_id_foreign');
            //$table->dropForeign('inscritos_piloto_id_foreign');
        });
    }
}