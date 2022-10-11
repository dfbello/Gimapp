<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clases', function (Blueprint $table) {
            $table->foreign(['Clave_ClienteFK2'], 'fk_fClienteFK2')->references(['Clave_Cliente'])->on('clientes');
            $table->foreign(['Clave_EntrenadorFK1'], 'fk_fCEntrenadorFK1')->references(['Clave_Entrenador'])->on('entrenador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clases', function (Blueprint $table) {
            $table->dropForeign('fk_fClienteFK2');
            $table->dropForeign('fk_fCEntrenadorFK1');
        });
    }
}
