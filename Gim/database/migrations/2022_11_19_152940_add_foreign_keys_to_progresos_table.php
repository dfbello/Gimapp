<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progresos', function (Blueprint $table) {
            $table->foreign(['Clave_ClienteFK4'], 'fk_fClienteFK4')->references(['Clave_Cliente'])->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progresos', function (Blueprint $table) {
            $table->dropForeign('fk_fClienteFK4');
        });
    }
}
