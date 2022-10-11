<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAsignadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignados', function (Blueprint $table) {
            $table->foreign(['Clave_RutinaFK1'], 'fk_fRutinaFK1')->references(['Clave_Rutina'])->on('rutina');
            $table->foreign(['Clave_EjercicioFK2'], 'fk_fCEjercicioFK2')->references(['Clave_Ejercicio'])->on('ejercicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asignados', function (Blueprint $table) {
            $table->dropForeign('fk_fRutinaFK1');
            $table->dropForeign('fk_fCEjercicioFK2');
        });
    }
}
