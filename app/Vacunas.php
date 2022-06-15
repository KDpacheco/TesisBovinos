<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Vacunas extends Model
{
    protected $table='registro_vacunas';
    protected $primaryKey = "registro_vacunas_id";
    public $timestamps=true;
    protected $dates = ['deleted_at','registro_vacunas_proxima'];
    protected $fillable=[
        
        'animal_id',
        'vacuna_id',
        'registro_vacunas_fecha'
    ];
}
