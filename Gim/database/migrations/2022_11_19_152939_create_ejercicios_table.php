<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjerciciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercicios', function (Blueprint $table) {
            $table->integer('Clave_Ejercicio', true);
            $table->string('Nombre_Ejercicio', 50)->nullable();
            $table->string('Descripcion_Ejercicio', 10000)->nullable();
            $table->set('Zona_Trabajada', ['Brazo', 'Pierna', 'Pecho', 'Abdomen', 'Espalda', 'Cardio'])->nullable();
            $table->integer('Series_Ejercicio')->nullable();
            $table->integer('Repeticiones_Ejercicio')->nullable();
            $table->string('Link_Ejercicio', 200)->nullable();
            $table->integer('Clave_RecursoFK1')->nullable();
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
        Schema::dropIfExists('ejercicios');
    }
}
