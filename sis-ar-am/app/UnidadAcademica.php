<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadAcademica extends Model
{
    protected $table='unidadacademica';

    protected $fillable=['nombre','facultad'];

    public function users(){
        return $this->hasMany('App/User');
    }
}
