<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Raza extends Model
{
    protected $table='raza';
    protected $primaryKey = "raza_id";
    public $timestamps=false;
    protected $fillable=[
        'raza_nombre',
        'acr'
    ];
}
