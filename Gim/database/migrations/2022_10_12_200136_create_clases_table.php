<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->integer('Clave_Clase', true);
            $table->string('Nombre_Clase', 100)->nullable();
            $table->string('Descripcion_Clase', 100)->nullable();
            $table->integer('Cupos_Clase')->nullable();
            $table->timestamp('Horario_Clase')->nullable();
            $table->integer('Duracion')->nullable();
            $table->integer('Clave_EntrenadorFK1')->nullable()->index('fk_fCEntrenadorFK1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clases');
    }
}
