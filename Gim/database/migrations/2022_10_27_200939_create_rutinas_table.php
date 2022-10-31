<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutinas', function (Blueprint $table) {
            $table->integer('Clave_Rutina', true);
            $table->set('Objetivo', ['construir musculo', 'perder grasa', 'ganar musculo', 'perder peso', 'Mejorar el rendimiento'])->nullable();
            $table->set('nivel', ['basico', 'medio', 'alto'])->nullable();
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
        Schema::dropIfExists('rutinas');
    }
}
