<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGananciasMensuales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ganancias_mensuales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('ganancia');
            $table->string('mes');
            $table->integer('anno');
            $table->integer('pagado');
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ganancias_mensuales');
    }
}
