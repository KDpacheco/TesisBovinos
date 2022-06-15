<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;    
use App\Http\Requests;
use App\Enfermedades;
use App\Http\Requests\EnfermedadesFormRequest;
use App\Animal;
use DB;
use DateTime;

class EnfermedadesController extends Controller
{
    public function index(Request $request)
    {
        if($request){
        $query =trim($request->get('searchText'));
        if($query)
        {
            $enfermedades=Enfermedades::where('animal_id','LIKE',$query)
            ->orderBy('registro_enfermedades_id','desc')
            ->paginate(5);
        }
        else{
            $enfermedades=Enfermedades::where('registro_enfermedades_id','LIKE','%'.$query.'%')
            ->orderBy('registro_enfermedades_id','desc')
            ->paginate(5);
        }
            return view('enfermedades.index',["enfermedades"=>$enfermedades,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $animales=Animal::where('animal_estado','>',4)
        ->orWhere('animal_estado','<',2)->get();
        return view('enfermedades.create',["animales"=>$animales]);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnfermedadesFormRequest $request)
    {
        $enfermedades = new Enfermedades;
        $enfermedades->animal_id = $request->get('animal');
        $enfermedades->enfermedad_fecha=$request->get('fecha');
        $enfermedades->enfermedad_nombre=$request->get('enfermedad');
        $enfermedades->enfermedad_estado=$request->get('estado');
        $enfermedades->enfermedad_fecha_tratamiento=$request->get('fecha_tratamiento');
        $enfermedades->save();
        return redirect('enfermedades'); 
    }

}
