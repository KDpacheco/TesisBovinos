<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monta extends Model
{
    protected $table='monta';
    protected $primaryKey = "monta_id";
    public $timestamps=true;
    protected $fillable=[
        'monta_madre',
        'monta_padre',
        'monta_fecha',
        'monta_exitosa'
    ];
}
