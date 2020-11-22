<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table='clases';
    protected $fillable=['nombre','grupo','unidad'];
    // public $timestamps=false;

    public function clases(){
        return $this->hasMany('App/Clase');
    }
    public function unidadacademica(){
        return $this->hasMany('App/UnidadAcademica');
    }
    public function horas(){
        return $this->hasMany('App/Hora');
    }
}

