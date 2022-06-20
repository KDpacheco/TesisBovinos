<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Animal extends Model
{
    protected $table='animal';
    protected $primaryKey = "animal_id";
    public $incrementing = false;
    public $timestamps=true;
    use SoftDeletes;
    protected $dates = ['deleted_at','animal_nacimiento','fecha_secado'];
    protected $fillable=[
        'animal_id',
        'animal_madre',
        'animal_padre',
        'animal_color',
        'animal_peso',
        'animal_raza',
        'animal_sexo',
        'animal_nacimiento',
        'animal_estado',
        'animal_produccion',
        'fecha_secado',
        'codigo_bien',
        'animal_arete'
    ];
}
