<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradors', function (Blueprint $table) {
            $table->integer('Clave_Administrador')->primary();
            $table->string('Nombre_Administrador', 100)->nullable();
            $table->bigInteger('Telefono_Administrador')->nullable();
            $table->string('Direccion_Administrador', 200)->nullable();
            $table->string('Correo_Administrador', 50)->nullable();
            $table->string('Edad_Administrador', 200)->nullable();
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
        Schema::dropIfExists('administradors');
    }
}
