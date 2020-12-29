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
        DB::table('users')->insert(array('id'=>'1','nombre'=>'Admin','apellido'=>'Bellido','codsis'=>'202020201','ci'=>'12345678','rol'=>'1','email'=>'admin@gmail.com','password'=>bcrypt('12345')));
        DB::table('users')->insert(array('id'=>'2','nombre'=>'Jhimy','apellido'=>'Villaroel Novillo','codsis'=>'2020203','ci'=>'12345678','rol'=>'2','email'=>'jhimy@gmail.com','password'=>bcrypt('12345')));
        DB::table('users')->insert(array('id'=>'3','nombre'=>'David','apellido'=>'Escalera Fernandez','codsis'=>'20202021','ci'=>'12345678','rol'=>'3','email'=>'david@gmail.com','password'=>bcrypt('12345')));
        DB::table('users')->insert(array('id'=>'4','nombre'=>'Erika Patricia','apellido'=>'Rodriguez Bilbao','codsis'=>'20202001','ci'=>'12345678','rol'=>'3','email'=>'erika@gmail.com','password'=>bcrypt('12345')));


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
