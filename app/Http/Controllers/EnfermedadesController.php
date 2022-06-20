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
        if(request()->ajax()){
        
        if(!empty($request->from_date))
        {
            $enfermedades=Enfermedades::whereBetween('enfermedad_fecha', array($request->from_date, $request->to_date))->get();
        }
        else{
            $enfermedades=Enfermedades::get();
        }
        return datatables()->of($enfermedades)
        ->addColumn('pdf', function ($pdf) {
            return '<a href="' . route('enfermedades.individual', $pdf->registro_enfermedades_id) . '">
            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                title="Informe del parto"><i class="mdi mdi-file-pdf"></i>
            </button></a>';
        }
        )
        ->rawColumns(['pdf'])
        ->make(true);
        }
        return view('enfermedades.index');
    }
    public function create()
    {
        $animales=Animal::where('animal_estado','>',3)
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
        if($request->get('estado')=="Tratado")
        {
            $enfermedades->enfermedad_fecha_tratamiento=$request->get('fecha_tratamiento');
            $enfermedades->enfermedad_tratamiento=$request->get('tratamiento');
        }
       
        $enfermedades->save();
        return redirect('enfermedades'); 
    }

}
