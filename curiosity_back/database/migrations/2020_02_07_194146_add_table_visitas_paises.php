<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableVisitasPaises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_visita_pais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('iso_2');
            $table->string('iso_3');
            $table->integer('visitas');
            $table->integer('url_id')->unsigned();

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
        Schema::dropIfExists('url_visita_pais');
    }
}
