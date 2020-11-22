<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

<<<<<<< HEAD:sis-ar-am/database/migrations/2020_11_21_232400_crear_tabla_roles.php
class CrearTablaRoles extends Migration
=======
class CreateHorasTable extends Migration
>>>>>>> develop:sis-ar-am/database/migrations/2020_11_21_004312_create_horas_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:sis-ar-am/database/migrations/2020_11_21_232400_crear_tabla_roles.php
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descrip_rol', 20);


=======
        Schema::create('horas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hora');
            $table->string('dia');
            $table->integer('materia')->unsigned();
            
            $table->foreign("materia")->references("id")->on("materias");
>>>>>>> develop:sis-ar-am/database/migrations/2020_11_21_004312_create_horas_table.php
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
<<<<<<< HEAD:sis-ar-am/database/migrations/2020_11_21_232400_crear_tabla_roles.php
        Schema::dropIfExists('roles');
=======
        Schema::dropIfExists('horas');
>>>>>>> develop:sis-ar-am/database/migrations/2020_11_21_004312_create_horas_table.php
    }
}
