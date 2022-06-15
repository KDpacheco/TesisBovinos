<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Partos extends Model
{
    protected $table='partos';
    protected $primaryKey = "partos_id";
    public $timestamps=true;
    use SoftDeletes;
    protected $dates = ['deleted_at','fecha_aproximada'];
    protected $fillable=[
        'partos_madre',
        'hijo_id',
        'partos_fecha',
        'partos_complicaciones',
        'partos_descripción'
    ];
}
