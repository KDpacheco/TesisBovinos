<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ordeño extends Model
{
    protected $table='registro_ordeño';
    protected $primaryKey = "registro_ordeño_id";
    public $timestamps=true;
    protected $dates = ['deleted_at','partos_fecha'];
    protected $fillable=[
        'animal_id',
        'registro_ordeño_litros',
        'registro_ordeño_cantidad',
        'registro_ordeño_fecha',
        'partos_id'
    ];
}
