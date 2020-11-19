<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table='tipousuario';
    protected $fillable=['tipoUsuario'];
    public $timestamps=false;

    public function users(){
        return $this->hasMany('App/User');
    }
}
