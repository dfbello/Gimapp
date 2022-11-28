<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrenadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrenadors', function (Blueprint $table) {
            $table->integer('Clave_Entrenador')->primary();
            $table->string('Nombre_Entrenador', 100)->nullable();
            $table->bigInteger('Telefono_Entrenador')->nullable();
            $table->string('Direccion_Entrenador', 200)->nullable();
            $table->string('Correo_Entrenador', 50)->nullable();
            $table->string('Edad_Entrenador', 200)->nullable();
            $table->string('Descripcion_Entrenador', 200)->nullable();
            $table->string('Horario_Entrenador', 200)->nullable();
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
        Schema::dropIfExists('entrenadors');
    }
}
