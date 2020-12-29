<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hora');
            $table->string('dia');
            $table->string('tipo');

            $table->integer('materia')->unsigned();
            $table->foreign("materia")->references("id")->on("materias");
            $table->timestamps();
        });

        DB::table('horas')->insert(array('id'=>'1','hora'=>'11:15','dia'=>'LU','tipo'=>'docent','materia'=>'1'));
        DB::table('horas')->insert(array('id'=>'2','hora'=>'9:45','dia'=>'MA','tipo'=>'docent','materia'=>'1'));
        DB::table('horas')->insert(array('id'=>'3','hora'=>'12:45','dia'=>'JU','tipo'=>'docent','materia'=>'1'));

        DB::table('horas')->insert(array('id'=>'4','hora'=>'14:14','dia'=>'MA','tipo'=>'docent','materia'=>'2'));
        DB::table('horas')->insert(array('id'=>'5','hora'=>'15:45','dia'=>'VI','tipo'=>'docent','materia'=>'2'));

        DB::table('horas')->insert(array('id'=>'6','hora'=>'6:45','dia'=>'LU','tipo'=>'docent','materia'=>'3'));
        DB::table('horas')->insert(array('id'=>'7','hora'=>'6:45','dia'=>'JU','tipo'=>'docent','materia'=>'3'));


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horas');
    }
}
