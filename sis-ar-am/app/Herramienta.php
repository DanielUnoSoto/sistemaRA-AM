<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    protected $table='herramientas';
    protected $fillable=['nombre'];
    public $timestamps=false;
}
