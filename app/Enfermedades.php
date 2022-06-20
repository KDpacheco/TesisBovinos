<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedades extends Model
{
    protected $table='registro_enfermedades';
    protected $primaryKey = "registro_enfermedades_id";
    public $timestamps=true;
    protected $fillable=[
        'animal_id',
        'enfermedad_nombre',
        'enfermedad_estado',
        'enfermedad_fecha',
        'enfermedad_fecha_tratamiento',
        'enfermedad_tratamiento'
    ];
}
