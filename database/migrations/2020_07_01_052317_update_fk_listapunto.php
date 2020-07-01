<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFkListaPunto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listapuntos', function (Blueprint $table) {
            //
            $table->foreign('punto_id')
                ->references('id')->on('puntos')
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
        Schema::table('listapuntos', function (Blueprint $table) {
            //
            $table->dropForeign('listapuntos_punto_id_foreign');
        });
    }
}