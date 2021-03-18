<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGananciasDiariasAdsense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ganancias_diarias_adsense', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->double('ganancia');
            $table->integer('user_id')->unsigned();
            $table->integer('url_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('url_id')->references('id')->on('urls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ganancias_diarias_adsense');
    }
}
