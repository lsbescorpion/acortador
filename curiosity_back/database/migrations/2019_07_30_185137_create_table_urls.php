<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUrls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->increments('id');
            $table->text('url_real');
            $table->string('url_acortada');
            $table->text('accion');
            $table->text('foto');
            $table->string('titulo');
            $table->text('descripcion');
            $table->datetime('fecha');
            $table->integer('visitas');
            $table->integer('user_id')->unsigned();
            $table->integer('categoria_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urls');
    }
}
