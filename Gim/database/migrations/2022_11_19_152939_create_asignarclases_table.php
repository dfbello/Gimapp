<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignarclasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignarclases', function (Blueprint $table) {
            $table->integer('Clave_ClaseFK1')->nullable()->index('fk_fClaseFK1');
            $table->integer('Clave_ClienteFK3')->nullable()->index('fk_fClienteFK3');
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
        Schema::dropIfExists('asignarclases');
    }
}
