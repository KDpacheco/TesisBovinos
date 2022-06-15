<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Animal;

class NutricionController extends Controller
{
    public function index()
    {
        $animales=Animal::get();
        return view('nutricion.index',["animales"=>$animales]);
    }

    public function Calculo($id)
    {
        $animales=Animal::findOrFail($id);
        $peso=$animales->animal_peso;
        return $peso;
    }

}
