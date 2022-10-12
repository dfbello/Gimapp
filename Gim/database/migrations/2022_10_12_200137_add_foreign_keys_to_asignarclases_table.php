<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAsignarclasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignarclases', function (Blueprint $table) {
            $table->foreign(['Clave_ClienteFK2'], 'fk_fClienteFK2')->references(['Clave_Cliente'])->on('clientes');
            $table->foreign(['Clave_ClaseFK1'], 'fk_fClaseFK1')->references(['Clave_Clase'])->on('clases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asignarclases', function (Blueprint $table) {
            $table->dropForeign('fk_fClienteFK2');
            $table->dropForeign('fk_fClaseFK1');
        });
    }
}
