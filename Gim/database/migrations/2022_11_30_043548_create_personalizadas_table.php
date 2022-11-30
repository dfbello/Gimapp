<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalizadas', function (Blueprint $table) {
            $table->integer('Clave_Personalizada', true);
            $table->string('Nombre_Personalizada', 100)->nullable();
            $table->string('Descripcion_Personalizada', 100)->nullable();
            $table->integer('Cupos_Personalizada')->nullable();
            $table->timestamp('Horario_Personalizada')->nullable();
            $table->integer('Duracion')->nullable();
            $table->integer('Clave_EntrenadorFK2')->nullable()->index('fk_fCEntrenadorFK2');
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
        Schema::dropIfExists('personalizadas');
    }
};
