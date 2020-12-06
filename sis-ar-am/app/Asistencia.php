<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'id','hora','fecha' ,'contenido','plataforma','observacion','herramientas', 'fechaRepo','link','archivo','tipoclase',
    ];

    public function horas(){
        return $this->belongsTo('App/Hora');
    }
}
