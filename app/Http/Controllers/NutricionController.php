<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Animal;

class NutricionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $animales=Animal::where('animal_estado','<',2)->where('animal_id','!=',"inseminación")->orWhere('animal_estado','>',3)->get();
        return view('nutricion.index',["animales"=>$animales]);
    }

    public function Calculo($id)
    {
        $animales=Animal::findOrFail($id);
        $peso=$animales->animal_peso;
        return $peso;
    }

}
