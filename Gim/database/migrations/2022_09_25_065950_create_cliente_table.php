<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('Clave_Cliente')->primary();
            $table->string('Nombre_Cliente', 100)->nullable();
            $table->bigInteger('Telefono_Cliente')->nullable();
            $table->string('Direccion_Cliente', 200)->nullable();
            $table->string('Correo_Cliente', 50)->nullable();
            $table->string('Edad_ACliente', 200)->nullable();
            $table->string('Contrasenia_Cliente', 200)->nullable();
            $table->string('Suscripcion_Cliente', 200)->nullable();
            $table->float('Peso_Cliente', 10, 0)->nullable();
            $table->float('Estatura_Cliente', 10, 0)->nullable();
            $table->float('IMC_Cliente', 10, 0)->nullable();
            $table->string('Objetivos_Cliente', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
