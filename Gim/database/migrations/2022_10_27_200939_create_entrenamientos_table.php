<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrenamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrenamientos', function (Blueprint $table) {
            $table->integer('Clave_Entrenamiento', true);
            $table->integer('Clave_ClienteFK2')->nullable()->index('fk_fClienteFK2');
            $table->integer('Clave_RutinaFK2')->nullable()->index('fk_fRutinaFK2');
            $table->string('hora', 20)->nullable();
            $table->date('fecha')->nullable();
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
        Schema::dropIfExists('entrenamientos');
    }
}
