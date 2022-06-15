<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muertes extends Model
{
    protected $table='registro_muertes';
    protected $primaryKey = "registro_muertes_id";
    public $timestamps=true;
    protected $fillable=[
        'animal_id',
        'registro_muertes_fecha',
        'registro_muertes_causa',
    ];
}