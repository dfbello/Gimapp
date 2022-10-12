<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->integer('Clave_Recurso')->primary();
            $table->string('Tipo_Recurso', 100)->nullable();
            $table->string('Descripcion_Recurso', 200)->nullable();
            $table->string('QR_Recurso', 50)->nullable();
            $table->string('Nombre_Recurso', 200)->nullable();
            $table->integer('Cantidad_Recurso')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recursos');
    }
}
