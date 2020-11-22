<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='roles';
    protected $fillable=['rol'];
    public $timestamps=false;

    public function materias(){
        return $this->hasMany('App/Materia');
    }
}
