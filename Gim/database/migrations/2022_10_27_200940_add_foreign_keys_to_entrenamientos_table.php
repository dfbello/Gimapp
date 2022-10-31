<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEntrenamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entrenamientos', function (Blueprint $table) {
            $table->foreign(['Clave_RutinaFK2'], 'fk_fRutinaFK2')->references(['Clave_Rutina'])->on('rutinas');
            $table->foreign(['Clave_ClienteFK2'], 'fk_fClienteFK2')->references(['Clave_Cliente'])->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entrenamientos', function (Blueprint $table) {
            $table->dropForeign('fk_fRutinaFK2');
            $table->dropForeign('fk_fClienteFK2');
        });
    }
}
