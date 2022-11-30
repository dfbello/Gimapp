<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignarpersonalizadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignarpersonalizadas', function (Blueprint $table) {
            $table->integer('Clave_PersonalizadaFK1')->nullable()->index('fk_fPersonalizadaFK1');
            $table->integer('Clave_ClienteFK5')->nullable()->index('fk_fClienteFK5');
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
        Schema::dropIfExists('asignarpersonalizada');
    }
}
