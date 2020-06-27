<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFkResultado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resultados', function (Blueprint $table) {
            //
            $table->foreign('carrera_id')
                ->references('id')->on('carreras')
                ->onDelete('cascade');

            $table->foreign('inscrito_id')
                ->references('id')->on('inscritos')
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
        Schema::table('resultados', function (Blueprint $table) {
            //
            $table->dropForeign('resultados_inscrito_id_foreign');
        });
    }
}