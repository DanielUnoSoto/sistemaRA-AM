<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table='clases';
    protected $fillable=['id','materia','user'];
    // public $timestamps=false;

    public function materias(){
        return $this->belongsTo('App/Materia');
    }
    public function users(){
        return $this->belongsTo('App/User');
    }
}

