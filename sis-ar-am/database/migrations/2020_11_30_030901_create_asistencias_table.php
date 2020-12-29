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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('usuario')->unsigned();
            $table->foreign("usuario")->references("id")->on("users");

            $table->date('fecha')->nullable();
            $table->string('contenido');
            $table->string('plataforma')->nullable();
            $table->string('observacion')->nullable();
            $table->string('herramientas')->nullable();
            $table->string('fecharepo')->nullable();
            $table->string('link')->nullable();
            $table->string('archivos')->nullable();
            $table->string('tipoclase')->nullable();
            $table->integer('hora')->unsigned();
            $table->foreign("hora")->references("id")->on("horas");
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
        Schema::dropIfExists('asistencias');
    }
}
