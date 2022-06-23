<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
    protected $table='registro_peso';
    protected $primaryKey = "registro_peso_id";
    public $timestamps=true;
    protected $fillable=[
        
        'animal_id',
        'registro_peso_fecha',
        'registro_peso_valor',
        'peso_anterior'
    ];
}