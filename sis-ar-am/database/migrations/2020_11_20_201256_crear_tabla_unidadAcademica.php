<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUnidadAcademica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidadacademica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('facultad')->nullable();

            $table->integer('jefe')->unsigned()->nullable();
            $table->foreign('jefe')->references('id')->on('users');
            
            $table->timestamps();
        });

        DB::table('unidadacademica')->insert(array('id'=>'1','nombre'=>'Igenieria de Sistemas','facultad'=>'Ciencias y Tecnologia'));
        DB::table('unidadacademica')->insert(array('id'=>'2','nombre'=>'Igenieria Industrial','facultad'=>'Ciencias y Tecnologia'));
        DB::table('unidadacademica')->insert(array('id'=>'3','nombre'=>'Igenieria Informatica','facultad'=>'Ciencias y Tecnologia'));
        DB::table('unidadacademica')->insert(array('id'=>'4','nombre'=>'Igenieria Quimica','facultad'=>'Ciencias y Tecnologia'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidadAcademica');
    }
}
