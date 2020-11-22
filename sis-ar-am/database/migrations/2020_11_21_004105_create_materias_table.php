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

        DB::table('materias')->insert(array('id'=>'1','nombre'=>'Algebra I','grupo'=>'1','unidad'=>'1'));
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
