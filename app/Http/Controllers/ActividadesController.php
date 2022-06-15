<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;    
use App\Http\Requests;
use App\Actividades;
use Carbon\Carbon;
use App\Http\Requests\ActividadesFormRequest;
use App\ListaActividades;
use App\Animal;
use DB;
use DateTime;

class ActividadesController extends Controller
{
    public function __construct(){

    }
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
            $data=Actividades::join('actividades','registro_actividades.actividades_id','=','actividades.actividades_id')
            ->where('animal_id','LIKE',$query)
            ->orderBy('registro_actividades_id','desc')
            ->paginate(5);
            }
            else{
                $data=Actividades::join('actividades','registro_actividades.actividades_id','=','actividades.actividades_id')
                ->where('registro_actividades_id','LIKE','%'.$query.'%')
                ->orderBy('registro_actividades_id','desc')
                ->paginate(5);
            }
            
            return view('actividades.index',["data"=>$data,"searchText"=>$query]);
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
        return view('actividades.create',["animales"=>$animales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActividadesFormRequest $request)
    {
        $actividades = new Actividades;
        $actividades->animal_id = $request->get('animal');
        $actividades->actividades_id=$request->get('actividad');
        $actividades->registro_actividades_fecha=$request->get('fecha');
        $actividades->registro_actividades_proxima=$this->CalcFecha($request->get('fecha'),$request->get('actividad'));
        $actividades->save();
        return redirect('actividades'); 
    }

    protected function CalcFecha($fecha,$actividad)
    {
        $fecha=Carbon::parse($fecha);
    
        if($actividad==6)
        {
           return $fecha->addMonths(5);
        }
        else{
            if($actividad==7){
               return $fecha->addMonths(5); 
            }
            else{
                if($actividad==8){
                    return $fecha->addDays(15);
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

    public function SelectActividades($id)
    {
        $animales=Animal::findOrFail($id);
        $cat=$animales->animal_categoria;
        if($cat==1)
        {
            return ListaActividades::where('actividades_nivel','=',1)->get();
        }
        else
        {
            return ListaActividades::where('actividades_nivel','=',2)->get();
        }
    }
}
