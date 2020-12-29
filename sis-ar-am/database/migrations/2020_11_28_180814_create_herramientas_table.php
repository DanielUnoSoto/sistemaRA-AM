<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerramientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herramientas', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombre');
            $table->timestamps();
        });

        DB::table('herramientas')->insert(array('id'=>'1','nombre'=>'Google Meet'));
        DB::table('herramientas')->insert(array('id'=>'2','nombre'=>'Zoom'));
        DB::table('herramientas')->insert(array('id'=>'3','nombre'=>'Google Doc'));
        DB::table('herramientas')->insert(array('id'=>'4','nombre'=>'Microsoft Diapositivas'));
        DB::table('herramientas')->insert(array('id'=>'5','nombre'=>'Pizarra Google'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('herramientas');
    }
}
