<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFkCarrera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carreras', function (Blueprint $table) {


            $table->foreign('circuito_id')
                ->references('id')->on('circuitos')
                ->onDelete('cascade');

            $table->foreign('campeonato_id')
                ->references('id')->on('campeonatos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carreras', function (Blueprint $table) {
            $table->dropForeign('carreras_circuito_id_foreign');
            $table->dropForeign('carreras_campeonato_id_foreign');
        });
    }
}