<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMunicipioToPerfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perfil', function (Blueprint $table) {
            $table->bigInteger('municipio_id')->unsigned();

            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perfil', function (Blueprint $table) {
            $table->dropColumn(['municipio_id']);
        });
    }
}
