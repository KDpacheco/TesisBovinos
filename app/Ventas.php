<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table='ventas';
    protected $primaryKey = "ventas_id";
    public $timestamps=true;
    protected $fillable=[
        
        'animal_id',
        'ventas_fecha',
        'ventas_valor',
        'cedula_cliente',
        'estado_anterior'
    ];
}

