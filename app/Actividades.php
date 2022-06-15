<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use\Carbon\Carbon;

class Actividades extends Model
{
    protected $table='registro_actividades';
    protected $primaryKey = "registro_actividades_id";
    public $timestamps=true;
    protected $dates = ['deleted_at','registro_actividades_proxima'];
    protected $fillable=[
        
        'animal_id',
        'actividades_id',
        'registro_actividades_fecha',
        'registro_actividades_proxima',
    ];
}
