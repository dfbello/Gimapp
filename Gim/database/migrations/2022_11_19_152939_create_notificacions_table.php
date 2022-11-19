<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacions', function (Blueprint $table) {
            $table->integer('Clave_Noti', true);
            $table->integer('De_Noti')->nullable();
            $table->integer('Para_Noti')->nullable();
            $table->set('Asunto_Noti', ['valoracion', 'entrenador', 'nueva_clase', 'confirmar_valoracion', 'confirmar_entrenador'])->nullable();
            $table->string('Mensaje_Noti', 200)->nullable();
            $table->timestamp('Fecha')->nullable();
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
        Schema::dropIfExists('notificacions');
    }
}
