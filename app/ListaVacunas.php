<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaVacunas extends Model
{
    protected $table='vacunas';
    protected $primaryKey = "vacuna_id";
    public $timestamps=true;
    protected $fillable=[
        'vacuna_nombre'
    ];
}
