<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutina', function (Blueprint $table) {
            $table->integer('Clave_Rutina')->primary();
            $table->string('Fecha_Rutina', 100)->nullable();
            $table->string('Hora_Rutina', 10)->nullable();
            $table->integer('Clave_ClienteFK1')->nullable()->index('fk_fClienteFK1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutina');
    }
}
