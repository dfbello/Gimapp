<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjercicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercicio', function (Blueprint $table) {
            $table->integer('Clave_Ejercicio')->primary();
            $table->string('Descripcion_Ejercicio', 100)->nullable();
            $table->integer('Series_Ejercicio')->nullable();
            $table->integer('Repeticiones_Ejercicio')->nullable();
            $table->integer('Clave_RecursoFK1')->nullable()->index('fk_fRecursoFK1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejercicio');
    }
}
