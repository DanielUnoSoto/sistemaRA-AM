<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{

    protected $table='horas';
    protected $fillable=['hora','dia','tipo','materia'];

    public function materias(){
        return $this->belongsTo('App/Materia');
    }
    public function asistencias(){
        return $this->hasMany('App/Asistencia');
    }
}
