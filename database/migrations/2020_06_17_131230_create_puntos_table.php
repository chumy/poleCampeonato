<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nombre');
            $table->integer('puntos1')->default(0);
            $table->integer('puntos2')->default(0);
            $table->integer('puntos3')->default(0);
            $table->integer('puntos4')->default(0);
            $table->integer('puntos5')->default(0);
            $table->integer('puntos6')->default(0);
            $table->decimal('penalizacion', 3, 2)->default(1.00);
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
        Schema::dropIfExists('puntos');
    }
}