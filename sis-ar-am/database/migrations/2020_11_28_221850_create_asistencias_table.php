<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Asistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contenido');
            $table->string('plataforma');
            $table->string('observacion');
            $table->string('link');
            $table->string('tipo_clase');
            $table->string('fecha_repo')->nullable();
            $table->string('heramientas');
            $table->integer('horario')->unsigned();
            $table->foreign('horario')->references("id")->on("horas");

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
        Schema::dropIfExists('Asistencias');
    }
}
