<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abortos extends Model
{
    protected $table='abortos';
    protected $primaryKey = "abortos_id";
    public $timestamps=true;
    protected $fillable=[
        'animal_id',
        'abortos_tipo',
        'abortos_fecha'
    ];
}