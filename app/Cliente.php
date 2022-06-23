<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';
    protected $primaryKey = "cedula";
    public $timestamps=true;
    protected $fillable=[
        
        'nombre',
        'teléfono',
        'cedula'
        
    ];
}
