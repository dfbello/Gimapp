<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAsignarpersonalizadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignarpersonalizadas', function (Blueprint $table) {
            $table->foreign(['Clave_ClienteFK5'], 'fk_fClienteFK5')->references(['Clave_Cliente'])->on('clientes');
            $table->foreign(['Clave_PersonalizadaFK1'], 'fk_fPersonalizadaFK1')->references(['Clave_Personalizada'])->on('personalizadas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asignarpersonalizadas', function (Blueprint $table) {
            $table->dropForeign('fk_fClienteFK5');
            $table->dropForeign('fk_fPersonalizadaFK1');
        });
    }
}
