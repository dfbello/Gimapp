<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->integer('Clave_Anuncio', true);
            $table->string('Nombre_Anuncio', 100)->nullable();
            $table->string('Descripcion_Anuncio', 100)->nullable();
            $table->string('Folleto_Anuncio', 100)->nullable();
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
        Schema::dropIfExists('_anuncios');
    }
};
