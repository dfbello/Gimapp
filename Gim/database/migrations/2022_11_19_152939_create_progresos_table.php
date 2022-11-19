<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresos', function (Blueprint $table) {
            $table->integer('Clave_Progreso', true);
            $table->integer('Clave_ClienteFK4')->nullable()->index('fk_fClienteFK4');
            $table->float('Peso_Cliente2', 10, 0)->nullable();
            $table->float('Estatura_Cliente2', 10, 0)->nullable();
            $table->float('IMC_Cliente2', 10, 0)->nullable();
            $table->string('Objetivos_Cliente2', 200)->nullable();
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
        Schema::dropIfExists('progresos');
    }
}
