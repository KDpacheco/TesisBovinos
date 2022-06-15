<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;    
use App\Http\Requests;
use App\Vacunas;
use Carbon\Carbon;
use App\ListaVacunas;
use App\Http\Requests\VacunasFormRequest;
use App\Animal;
use DB;
use DateTime;

class VacunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query =trim($request->get('searchText'));
            if($query)
            {
                $data=Vacunas::join('vacunas','registro_vacunas.vacuna_id','=','vacunas.vacuna_id')
                ->where('animal_id','LIKE',$query)
                ->orderBy('registro_vacunas_id','desc')
                ->paginate(5);
            }
            else
            {
                $data=Vacunas::join('vacunas','registro_vacunas.vacuna_id','=','vacunas.vacuna_id')
                ->where('registro_vacunas_id','LIKE','%'.$query.'%')
                ->orderBy('registro_vacunas_id','desc')
                ->paginate(5);
            }
            
            return view('vacunas.index',["data"=>$data,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animales=Animal::get();
        return view('vacunas.create',["animales"=>$animales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacunasFormRequest $request)
    {
        $vacunas = new vacunas;
        $vacunas->animal_id = $request->get('animal');
        $vacunas->vacuna_id=$request->get('vacuna');
        $vacunas->registro_vacunas_fecha=$request->get('fecha');
        $vacunas->registro_vacunas_proxima=$this->CalcFecha($request->get('fecha'),$request->get('vacuna'));
        $vacunas->save();
        return redirect('vacunas'); 
    }

    protected function CalcFecha($fecha,$vacuna)
    {
        $fecha=Carbon::parse($fecha);
    
        if($vacuna==4)
        {
           return $fecha->addMonths(6);
        }
        else{
            if($vacuna==5 || $vacuna==7 ){
               return $fecha->addMonths(6); 
            }
            else{
                if($vacuna==6){
                    return $fecha->addYear();
                }
                else
                {
                    return $fecha=null;
                }
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function SelectVacunas($id)
    {
        $animales=Animal::findOrFail($id);
        $cat=$animales->animal_categoria;
        if($cat==1)
        {
            return ListaVacunas::where('vacuna_nivel','=',1)->orWhere('vacuna_nivel','=',null)->get();
        }
        else{
            if($cat<4)
            {
                return ListaVacunas::where('vacuna_nivel',2)->orWhere('vacuna_nivel','=',null)->get();
            }
            else{
                return ListaVacunas::where('vacuna_nivel',3)->orWhere('vacuna_nivel','=',null)->get();
            }
        }
        

    }
}
