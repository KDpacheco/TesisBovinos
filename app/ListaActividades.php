<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaActividades extends Model
{
    protected $table='actividades';
    protected $primaryKey = "actividades_id";
    public $timestamps=true;
    protected $fillable=[
        'actividades_nombre'
    ];
}
