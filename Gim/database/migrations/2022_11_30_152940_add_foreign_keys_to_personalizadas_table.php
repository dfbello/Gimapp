<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonalizadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personalizadas', function (Blueprint $table) {
            $table->foreign(['Clave_EntrenadorFK2'], 'fk_fCEntrenadorFK2')->references(['Clave_Entrenador'])->on('entrenadors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personalizadas', function (Blueprint $table) {
            $table->dropForeign('fk_fCEntrenadorFK2');
        });
    }
}
