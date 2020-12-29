<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('grupo');

            $table->integer('unidad')->unsigned();
            $table->foreign("unidad")->references("id")->on("unidadacademica");

            $table->timestamps();
        });

        DB::table('materias')->insert(array('id'=>'1','nombre'=>'Inteligencia Artificial','grupo'=>'1','unidad'=>'1'));
        DB::table('materias')->insert(array('id'=>'2','nombre'=>'Taller de Ingenieria de Software','grupo'=>'4','unidad'=>'1'));
        DB::table('materias')->insert(array('id'=>'3','nombre'=>'Taller de Ingenieria de Software','grupo'=>'3','unidad'=>'1'));
        DB::table('materias')->insert(array('id'=>'4','nombre'=>'Algebra I','grupo'=>'8','unidad'=>'1'));
        DB::table('materias')->insert(array('id'=>'5','nombre'=>'Algebra I','grupo'=>'2','unidad'=>'2'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias');
    }
}
