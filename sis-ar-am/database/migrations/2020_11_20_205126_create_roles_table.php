<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rol');
            // $table->timestamps();
        });
        DB::table('roles')->insert(array('id'=>'1','rol'=>'administrador'));
        DB::table('roles')->insert(array('id'=>'2','rol'=>'autoridad'));
        DB::table('roles')->insert(array('id'=>'3','rol'=>'docente'));
        DB::table('roles')->insert(array('id'=>'4','rol'=>'auxiliar'));
        DB::table('roles')->insert(array('id'=>'5','rol'=>'auxiliar laboratorio'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
