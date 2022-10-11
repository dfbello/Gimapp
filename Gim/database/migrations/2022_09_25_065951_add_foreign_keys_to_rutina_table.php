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
        Schema::table('rutina', function (Blueprint $table) {
            $table->foreign(['Clave_ClienteFK1'], 'fk_fClienteFK1')->references(['Clave_Cliente'])->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rutina', function (Blueprint $table) {
            $table->dropForeign('fk_fClienteFK1');
        });
    }
}
