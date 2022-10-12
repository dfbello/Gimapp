<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRutinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rutinas', function (Blueprint $table) {
            $table->foreign(['Clave_ClienteFK1'], 'fk_fClienteFK1')->references(['Clave_Cliente'])->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rutinas', function (Blueprint $table) {
            $table->dropForeign('fk_fClienteFK1');
        });
    }
}
