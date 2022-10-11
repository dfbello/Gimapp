<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->integer('Clave_Clase')->primary();
            $table->string('Descripcion_Clase', 100)->nullable();
            $table->string('Horario_Clase', 50)->nullable();
            $table->integer('Clave_ClienteFK2')->nullable()->index('fk_fClienteFK2');
            $table->integer('Clave_EntrenadorFK1')->nullable()->index('fk_fCEntrenadorFK1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clase');
    }
}
