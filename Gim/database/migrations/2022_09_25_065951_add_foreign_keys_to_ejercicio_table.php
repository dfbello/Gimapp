<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEjercicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ejercicio', function (Blueprint $table) {
            $table->foreign(['Clave_RecursoFK1'], 'fk_fRecursoFK1')->references(['Clave_Recurso'])->on('recurso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ejercicio', function (Blueprint $table) {
            $table->dropForeign('fk_fRecursoFK1');
        });
    }
}
