<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('codsis')->unique();
            $table->string('ci');
            $table->integer('rol')->unsigned();

            $table->foreign("rol")->references("id")->on("roles");
            // ->onDelete("cascade")
            // ->onUpdate("cascade");

            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(array(
        'id'=>'1',
        'nombre'=>'David',
        'apellido'=>'Escalera',
        'codsis'=>'202020201',
        'ci'=>'12345678',
        'rol'=>'1',
        'email' => "daviescalera@gmail.com",
        'password' => '1234567'
        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
