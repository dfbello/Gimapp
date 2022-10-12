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
            $table->integer('Clave_Clase')->autoIncrement();
            $table->string('Nombre', 50)->nullable();
            $table->string('Descripcion_Clase', 100)->nullable();
            $table->integer('Cupos')->nullable();
            $table->timestamp('Horario_Clase')->nullable();
            $table->integer('Duracion')->nullable();
            $table->integer('Clave_EntrenadorFK1')->nullable()->index('fk_fCEntrenadorFK1');
            $table->integer('Clave_ClienteFK2')->nullable()->index('fk_fClienteFK2');
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
        Schema::dropIfExists('clases');
    }
}
