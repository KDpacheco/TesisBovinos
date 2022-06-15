<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Embarazo extends Model
{
    protected $table='embarazos';
    protected $primaryKey = "embarazos_id";
    public $timestamps=true;
    use SoftDeletes;
    protected $dates = ['deleted_at','fecha_aproximada'];
    protected $fillable=[
        'animal_madre',
        'animal_padre',
        'embarazos_fecha',
        'fecha_aproximada'
    ];
}
